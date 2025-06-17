<?php

namespace App\Http\Controllers\SOPIK;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sop;
use Illuminate\Support\Facades\Storage;
use \Carbon\Carbon;

class SopController extends Controller
{
    public function index(Request $request)
    {
        $query = Sop::query();

        if ($request->search) {
            $query->where('no_register', 'like', "%{$request->search}%")
                  ->orWhere('nama_sop', 'like', "%{$request->search}%");
        }

        if ($request->tanggal) {
            $query->whereDate('tanggal_update', $request->tanggal);
        }

        $sops = $query->latest()->paginate(10);

        return view('sop-ik.sop.dashboard-sop', compact('sops'));
    }

    public function create()
    {
        return view('sop-ik.sop.tambah-sop');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_register' => 'required|string|max:255',
            'nama_sop' => 'required|string|max:255',
            'tanggal_terbit' => 'required|date',
            'file_sop' => 'required|mimes:pdf|max:5120',
        ]);

        // Upload file PDF
        $filePath = $request->file('file_sop')->store('sop', 'public');

        // Simpan data ke DB
        $sop = new Sop();
        $sop->no_register = $request->no_register;
        $sop->nama_sop = $request->nama_sop;
        $sop->tanggal_terbit = $request->tanggal_terbit;
        $sop->tanggal_update = $request->tanggal_update ?? Carbon::now(); // ✅ default jika tidak diisi
        $sop->file_sop = $filePath;
        $sop->save();

        return redirect()->route('sop-ik.sop.index')->with('success', 'SOP berhasil ditambahkan.');
    }


    public function edit(Sop $sop)
    {
        return view('sop-ik.sop.edit-sop', compact('sop'));
    }

    public function update(Request $request, Sop $sop)
    {
        $request->validate([
            'no_register' => 'required|string|max:50',
            'nama_sop' => 'required|string|max:255',
            'tanggal_update' => 'required|date',
            'file_sop' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only(['no_register', 'nama_sop', 'tanggal_update']);

        if ($request->hasFile('file_sop')) {
            // Hapus file lama
            if ($sop->file_sop && Storage::disk('public')->exists($sop->file_sop)) {
                Storage::disk('public')->delete($sop->file_sop);
            }

            // Simpan file baru
            $data['file_sop'] = $request->file('file_sop')->store('sop', 'public');
        }

        $sop->update($data);

        return redirect()->route('sop-ik.sop.index')->with('success', 'SOP berhasil diperbarui.');
    }

    public function destroy(Sop $sop)
    {
        if ($sop->file_sop && Storage::disk('public')->exists($sop->file_sop)) {
            Storage::disk('public')->delete($sop->file_sop);
        }

        $sop->delete();

        return redirect()->route('sop-ik.sop.index')->with('success', 'SOP berhasil dihapus.');
    }

    public function daftarSOP(Request $request)
    {
        $query = Sop::query();

        if ($request->search) {
            $query->where('no_register', 'like', "%{$request->search}%")
                ->orWhere('nama_sop', 'like', "%{$request->search}%")
                ->orWhere('departemen', 'like', "%{$request->search}%");
        }

        if ($request->departemen) {
            $query->whereIn('departemen', $request->departemen);
        }

        $sops = $query->latest()->paginate(10)->withQueryString();

        // ✅ Tambahkan ini:
        $departemens = Sop::select('departemen')->distinct()->pluck('departemen');

        return view('sop-ik.sop.daftar-sop', compact('sops', 'departemens'));
    }


}
