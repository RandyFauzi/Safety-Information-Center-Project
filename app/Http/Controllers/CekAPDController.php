<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class CekAPDController extends Controller
{
    public function cekAPD(Request $request)
    {
        $nik = $request->query('nik');
        $user = null;
        $result = [];
        $totalPotong = 0;

        if ($nik) {
            $user = User::where('nik', $nik)->first();

            if (!$user) {
                return view('apd.cek-apd', [
                    'user' => null,
                    'result' => [],
                    'totalPotong' => 0,
                    'nik' => $nik,
                ])->with('error', 'NIK tidak ditemukan.');
            }

            // Ambil standar masa ganti
            $standar = DB::table('masa_ganti_apd')
                ->where('jabatan', $user->jabatan)
                ->where('departemen', $user->departemen)
                ->first();

            // Jika tidak ada, coba fallback departemen '-'
            if (!$standar) {
                $standar = DB::table('masa_ganti_apd')
                    ->where('jabatan', $user->jabatan)
                    ->where('departemen', '-')
                    ->first();
            }

            if (!$standar) {
                return view('apd.cek-apd', [
                    'user' => $user,
                    'result' => [],
                    'totalPotong' => 0,
                    'nik' => $nik,
                ])->with('error', 'Standar masa ganti belum disetting.');
            }

            // Harga APD
            $harga = [
                'helm' => 90000,
                'sepatu' => 278000,
                'kacamata' => 90000,
                'masker' => 5000,
                'earplug' => 20000,
            ];

            $apdList = ['helm', 'sepatu', 'kacamata', 'masker', 'earplug'];

            foreach ($apdList as $apd) {
                $latest = DB::table('history_pengambilan_apd')
                    ->where('nik', $nik)
                    ->whereNotIn($apd, [null, ''])
                    ->orderByDesc('tanggal_pengambilan')
                    ->first();

                $tglAmbil = $latest
                    ? Carbon::parse($latest->tanggal_pengambilan)
                    : ($user->tanggal_masuk ? Carbon::parse($user->tanggal_masuk) : null);

                $masaKey = 'masa_' . $apd;
                $masa = $standar->$masaKey ?? null;
                $sisa = '-';
                $potong = 0;

                if ($tglAmbil && $masa) {
                    $selisih = $tglAmbil->diffInMonths(now());
                    $sisaBulan = max($masa - $selisih, 0);
                    $sisa = 'Tersisa ' . floor($sisaBulan) . ' Bulan';

                    if ($sisaBulan > 0) {
                        $potong = ($harga[$apd] / $masa) * $sisaBulan;
                    }
                }

                $result[] = [
                    'apd' => ucwords($apd === 'kacamata' ? 'Kacamata Safety' : $apd),
                    'tglAmbil' => $tglAmbil ? $tglAmbil->format('Y-m-d') : '-',
                    'masa' => $masa,
                    'sisa' => is_numeric($sisaBulan ?? null) ? $sisa : '-',
                    'status' => (!$tglAmbil || ($sisaBulan ?? 0) <= 0) ? 'Sudah Masa Ganti' : 'Belum Masa Ganti',
                    'potong' => $potong,
                ];

                $totalPotong += $potong;
            }
        }

        return view('apd.cek-apd', compact('user', 'result', 'totalPotong', 'nik'));
    }
}
