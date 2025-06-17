<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengajuanAPDController extends Controller
{
    public function create(Request $request)
    {
        return view('apd.pengajuan-apd');
    }
    
    public function getUserByNIK(Request $request)
    {
        $nik = $request->query('nik'); // Ambil dari query GET

        $user = \App\Models\User::where('nik', $nik)->first();

        if (!$user) {
            return response()->json(['success' => false]);
        }

        return response()->json([
            'success' => true,
            'nama' => $user->name,
            'jabatan' => $user->jabatan,
            'departemen' => $user->departemen
        ]);
    }

    public function store(Request $request)
    {
        $user = DB::table('users')->where('nik', $request->nik)->first();
        if (!$user) {
            return back()->with('error', 'Data karyawan tidak ditemukan.');
        }

        $today = Carbon::now()->toDateString();

        $harga = [
            'helm' => 90000,
            'sepatu' => 278000,
            'kacamata' => 90000,
            'masker' => 5000,
            'earplug' => 20000,
        ];

        $apd = $request->input('apd', []);
        $detail = $request->input('detail', []);
        $keteranganTambahan = $request->input('keterangan', null);

        if (empty($apd)) {
            return back()->with('error', 'Silakan pilih minimal satu jenis APD.');
        }

        $data = [
            'nik' => $user->nik,
            'nama' => $user->name,
            'jabatan' => $user->jabatan,
            'departemen' => $user->departemen,
            'tanggal_pengambilan' => $today,
            'status_pengambilan' => 'Masa Pergantian',
            'total_potongan' => 0,
            'keterangan' => $keteranganTambahan ?? '-',
        ];

        $status = 'Masa Pergantian';
        $potongan = 0;

        foreach ($apd as $jenis => $val) {
        $masaGanti = DB::table('masa_ganti_apd')
            ->where('jabatan', $user->jabatan)
            ->where('departemen', $user->departemen)
            ->first() ?? DB::table('masa_ganti_apd')
                ->where('jabatan', $user->jabatan)
                ->first();

        if (!$masaGanti) {
            return back()->with('error', 'Data masa ganti APD tidak ditemukan.');
        }

        $last = DB::table('history_pengambilan_apd')
            ->where('nik', $user->nik)
            ->whereNotNull($jenis)
            ->orderByDesc('tanggal_pengambilan')
            ->first();

        $fieldMasa = 'masa_' . $jenis;
        if ($last && isset($masaGanti->$fieldMasa)) {
            $ambilTerakhir = Carbon::parse($last->tanggal_pengambilan);
            $hariBerjalan = $ambilTerakhir->diffInDays($today);

            if ($hariBerjalan < $masaGanti->$fieldMasa) {
                $status = 'Potong Gaji';
                $selisih = $masaGanti->$fieldMasa - $hariBerjalan;
                $potongan += round(($harga[$jenis] / $masaGanti->$fieldMasa) * $selisih);
            }
        }

            // ✅ 3. Pastikan variabel ini ditambahkan
            $nama_apd = $detail[$jenis] ?? ucfirst($jenis);
            $kode_apd = $this->getKodeAPD($nama_apd);

            if ($kode_apd) {
                $stok = DB::table('stok_apd')->where('kode_apd', $kode_apd)->first();
                if (!$stok || $stok->jumlah < 1) {
                    return back()->with('error', "Stok $jenis ($nama_apd) tidak mencukupi. Pengajuan dibatalkan.");
                }

                DB::table('stok_apd')->where('kode_apd', $kode_apd)->decrement('jumlah', 1);
            }

            // ✅ variabel $nama_apd sekarang sudah aman digunakan
            $data[$jenis] = $nama_apd;
        }
 

        $data['status_pengambilan'] = $status;
        $data['total_potongan'] = $status === 'Potong Gaji' ? $potongan : 0;

        DB::table('history_pengambilan_apd')->insert($data);

        return redirect()->route('pengajuan-apd.create')->with('success', 'Pengajuan APD berhasil disimpan.');
    }

    public function previewPotongan(Request $request)
    {
        $user = DB::table('users')->where('nik', $request->nik)->first();
        if (!$user) return response()->json(['success' => false, 'message' => 'Data karyawan tidak ditemukan.']);

        $apd = $request->input('apd', []);
        $detail = $request->input('detail', []);
        if (empty($apd)) return response()->json(['success' => false, 'message' => 'APD belum dipilih.']);

        $today = \Carbon\Carbon::now();
        $harga = [
            'helm' => 90000,
            'sepatu' => 278000,
            'kacamata' => 90000,
            'masker' => 5000,
            'earplug' => 20000,
        ];

        $totalPotongan = 0;
        $catatan = [];

        foreach ($apd as $jenis => $value) {
            // 1. Ambil detail yang dipilih user
            $nama_apd = $detail[$jenis] ?? null;

            // 2. Mapping Nama → Kode APD
            $kode_apd = $this->getKodeAPD($nama_apd);
            if ($kode_apd) {
                $stok = DB::table('stok_apd')->where('kode_apd', $kode_apd)->first();
                if (!$stok || $stok->jumlah <= 0) {
                    return response()->json([
                        'success' => false,
                        'message' => "Stok $jenis ($nama_apd) tidak mencukupi. Pengajuan dibatalkan."
                    ]);
                }
            }

            // 3. Cek Masa Ganti
            $masaGanti = DB::table('masa_ganti_apd')
                ->where('jabatan', $user->jabatan)
                ->where('departemen', $user->departemen)
                ->first() ?? DB::table('masa_ganti_apd')->where('jabatan', $user->jabatan)->first();

            $fieldMasa = 'masa_' . $jenis;
            if (!$masaGanti || !isset($masaGanti->$fieldMasa)) {
                $catatan[] = ucfirst($jenis) . ': Masa ganti tidak ditemukan.';
                continue;
            }

            $last = DB::table('history_pengambilan_apd')
                ->where('nik', $user->nik)
                ->whereNotNull($jenis)
                ->orderByDesc('tanggal_pengambilan')
                ->first();

            $tanggalAwal = $last ? Carbon::parse($last->tanggal_pengambilan) : Carbon::parse($user->tanggal_masuk);
            $hariBerjalan = $tanggalAwal->diffInDays($today);
            $masaHari = $masaGanti->$fieldMasa * 30;
            $sisaHari = $masaHari - $hariBerjalan;
            $sisaBulan = ceil($sisaHari / 30);

            if ($sisaHari > 0) {
                $status = 'Potong Gaji';
                $potong = round(($harga[$jenis] / $masaGanti->$fieldMasa) * $sisaBulan);
                $totalPotongan += $potong;
                $catatan[] = ucfirst($jenis) . ": Belum masa ganti (sisa {$sisaBulan} bulan), potong Rp " . number_format($potong, 0, ',', '.');
            } else {
                $catatan[] = ucfirst($jenis) . ": Sudah masa ganti (boleh ambil).";
            }
        }

        return response()->json([
            'success' => true,
            'catatan' => $catatan,
            'total_potongan' => $totalPotongan,
        ]);
    }

        private function getKodeAPD($nama_apd)
        {
            return [
                // Sepatu
                'Sepatu Safety No 1' => 'SPT-01',
                'Sepatu Safety No 2' => 'SPT-02',
                'Sepatu Safety No 3' => 'SPT-03',
                'Sepatu Safety No 4' => 'SPT-04',
                'Sepatu Safety No 5' => 'SPT-05',
                'Sepatu Safety No 6' => 'SPT-06',
                'Sepatu Safety No 7' => 'SPT-07',
                'Sepatu Safety No 8' => 'SPT-08',
                'Sepatu Safety No 10' => 'SPT-10',
                'Sepatu Safety No 11' => 'SPT-11',

                // Helm
                'Helm Safety Biru' => 'HLM-BIRU',
                'Helm Safety Kuning' => 'HLM-KUNING',
                'Helm Safety Orange' => 'HLM-ORANGE',
                'Helm Safety Putih' => 'HLM-PUTIH',
                'Helm Safety Hijau' => 'HLM-HIJAU',

                // Kacamata
                'Kacamata Safety - Namesis' => 'KMT-NMS',
                'Kacamata Safety - Hitam'   => 'KMT-HTM',

                // Masker & Earplug
                'Masker' => 'MSK-01',
                'Earplug' => 'ERP-01',
            ][$nama_apd] ?? null;
        }





}
