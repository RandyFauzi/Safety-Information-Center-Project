<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\HistoryPengambilanApd;
    use Illuminate\Support\Facades\Auth;
    use App\Models\MasaGantiAPD;
    use Carbon\Carbon;
    

    class RiwayatPengambilanController extends Controller
    {
        public function index(Request $request)
        {
            $query = HistoryPengambilanApd::query();

            // Filter sederhana
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('nik', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%");
                });
            }

            if ($request->filled('tanggal')) {
                $query->whereDate('tanggal_pengambilan', $request->tanggal);
            }

            $data = $query->orderByDesc('tanggal_pengambilan')->paginate(10);

            return view('apd.riwayat-pengambilan', compact('data'));
        }

        public function potongGaji(Request $request)
        {
            $data = HistoryPengambilanAPD::where('status_pengambilan', 'Potong Gaji')
                ->when($request->start_date && $request->end_date, function ($query) use ($request) {
                    $query->whereBetween('tanggal_pengambilan', [$request->start_date, $request->end_date]);
                })
                ->when($request->search, function ($query, $search) {
                    $query->where(function ($q) use ($search) {
                        $q->where('nik', 'like', "%$search%")
                        ->orWhere('nama', 'like', "%$search%");
                    });
                })
                ->latest('tanggal_pengambilan')
                ->paginate(10);

            return view('apd.potong-gaji', compact('data'));
        }

        // public function riwayatUser(Request $request)
        // {
        //     $user = Auth::user();

        //     // Cegah admin akses halaman ini
        //     if ($user->role === 'admin') {
        //         abort(403, 'Akses tidak diizinkan untuk admin.');
        //     }

        //     $data = HistoryPengambilanAPD::where('nik', $user->nik)
        //         ->orderByDesc('tanggal_pengambilan')
        //         ->paginate(10);

        //     return view('apd.riwayat-pengambilan-user', compact('data'));
        // }

        public function riwayatUser()
        {
            $user = Auth::user();

            // Ambil data masa ganti berdasarkan jabatan + departemen, fallback ke departemen '-'
            $masa = MasaGantiAPD::where('jabatan', $user->jabatan)
                ->where('departemen', $user->departemen)
                ->first();

            if (!$masa) {
                $masa = MasaGantiAPD::where('jabatan', $user->jabatan)
                    ->where('departemen', '-')
                    ->first();
            }

            // Ambil data riwayat pengambilan
            $data = HistoryPengambilanAPD::where('nik', $user->nik)
                ->latest('tanggal_pengambilan')
                ->paginate(10);

            $persen = [];

            foreach (['helm', 'sepatu', 'kacamata', 'masker', 'earplug'] as $apd) {
                // Cek pengambilan terakhir APD tertentu
                $lastTanggal = HistoryPengambilanAPD::where('nik', $user->nik)
                    ->whereNotNull($apd)
                    ->latest('tanggal_pengambilan')
                    ->value('tanggal_pengambilan');

                // Gunakan tanggal masuk jika belum pernah ambil APD
                $tglAwal = $lastTanggal
                    ? Carbon::parse($lastTanggal)
                    : ($user->tanggal_masuk ? Carbon::parse($user->tanggal_masuk) : null);

                // Cek apakah masa ganti tersedia
                if (!$tglAwal || !$masa || !isset($masa->{'masa_' . $apd})) {
                    $persen[$apd] = 0;
                    continue;
                }

                $totalHari = $masa->{'masa_' . $apd} * 30; // diasumsikan masa ganti dalam bulan
                $terpakai = $tglAwal->diffInDays(now());

                $persen[$apd] = max(0, 100 - round(($terpakai / $totalHari) * 100));
            }

            return view('apd.riwayat-pengambilan-user', compact('data', 'persen'));
        }

    }

