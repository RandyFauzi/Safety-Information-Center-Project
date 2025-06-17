<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DataKaryawanController extends Controller
{

    
    Public function index(Request $request)
    {
        // Ambil data dari query (search dan filter)
        $search = $request->input('search');
        $jabatan = $request->input('jabatan');
        $departemen = $request->input('departemen');

        // Query awal: hanya role user (bukan admin)
        $query = User::where('role', 'user');

        // Jika ada pencarian
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nik', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
            });
        }

        // Filter jabatan
        if ($jabatan) {
            $query->where('jabatan', $jabatan);
        }

        // Filter departemen
        if ($departemen) {
            $query->where('departemen', $departemen);
        }
        
        $allowedSortBy = ['nik', 'name', 'tanggal_masuk'];
        $allowedSortDir = ['asc', 'desc'];

        $sortBy = in_array($request->input('sort_by'), $allowedSortBy) ? $request->input('sort_by') : 'name';
        $sortDir = in_array($request->input('sort_dir'), $allowedSortDir) ? $request->input('sort_dir') : 'asc';

        $query->orderBy($sortBy, $sortDir);

        $totalKaryawan = (clone $query)->count();
        $totalAktif = (clone $query)->where('status', 'Aktif')->count();
        $totalTidakAktif = (clone $query)->where('status', '!=', 'Aktif')->count();

        $karyawans = $query->paginate(10);

        // Grafik Donut Jabatan (opsional kalau dipakai nanti)
        $chartJabatan = User::where('role', 'user')
            ->select('jabatan', \DB::raw('COUNT(*) as jumlah'))
            ->groupBy('jabatan')
            ->get();

        // Grafik Pertumbuhan per Bulan
        $growthData = User::where('role', 'user')
            ->whereNotNull('tanggal_masuk') // 🟢 Tambahkan ini
            ->selectRaw('DATE_FORMAT(tanggal_masuk, "%Y-%m") as bulan, COUNT(*) as jumlah')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Grafik Donut per Departemen
        $chartDepartemen = User::where('role', 'user')
            ->whereNotNull('departemen')
            ->where('departemen', '!=', '')
            ->select('departemen', \DB::raw('COUNT(*) as jumlah'))
            ->groupBy('departemen')
            ->get();


        // Untuk dropdown filter (optional jika tidak dipakai)
        $listJabatan = User::select('jabatan')->distinct()->pluck('jabatan');
        $listDepartemen = User::select('departemen')->distinct()->pluck('departemen');

        // Kirim ke view
        return view('karyawan.data-karyawan', compact(
            'karyawans', 'search', 'jabatan', 'departemen', 'sortBy', 'sortDir',
            'listJabatan', 'listDepartemen',
            'totalKaryawan', 'totalAktif', 'totalTidakAktif', 'growthData','chartJabatan', 'chartDepartemen'
        ));


    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:users,nik',
            'name' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
            'status' => 'required|in:Aktif,Tidak Aktif,Mutasi',
            'tanggal_masuk' => 'nullable|date',   
            'email' => 'required',
            'password' => 'required',   
            'role' => 'required',
        ]);

        User::create([
            'nik' => $validated['nik'],
            'name' => $validated['name'],
            'jabatan' => $validated['jabatan'],
            'departemen' => $validated['departemen'],
            'status' => $validated['status'],
            'tanggal_masuk' => $request->input('tanggal_masuk'),
            'email' => $validated['email'],
            'password' => bcrypt($validated['nik']), // Default password = NIK
            'role' => 'user',
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $karyawan = User::findOrFail($id); // Ganti dari Karyawan ke User

        $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
            'tanggal_masuk' => 'nullable|date', 
            'status' => 'required|in:Aktif,Tidak Aktif,Mutasi',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $karyawan->nik = $request->nik;
        $karyawan->name = $request->name;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->departemen = $request->departemen;
        $karyawan->tanggal_masuk = $request->input('tanggal_masuk');
        $karyawan->status = $request->status;
        $karyawan->email = $request->email;
        $karyawan->role = $request->role;

        // Jika admin mengisi password baru
        if (!empty($request->password)) {
            $karyawan->password = Hash::make($request->password);
        }

        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success', 'Data berhasil diupdate');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            User::whereIn('id', $ids)->delete(); // ganti dari Karyawan ke User
            return redirect()->route('karyawan.index')->with('success', 'Beberapa karyawan berhasil dihapus.');
        }
        return redirect()->route('karyawan.index')->with('error', 'Tidak ada karyawan yang dipilih.');
}

}
