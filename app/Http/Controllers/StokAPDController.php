<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Models\StokAPD;
    

    class StokAPDController extends Controller
    {
        public function index()
        {
            $stok = DB::table('stok_apd')->paginate(20);
            return view('apd.stok-apd', compact('stok'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'kode_apd' => 'required|unique:stok_apd,kode_apd',
                'jenis_apd' => 'required',
                'kategori' => 'required',
                'jumlah' => 'required|integer|min:0',
            ]);

            DB::table('stok_apd')->insert([
                'kode_apd' => $request->kode_apd,
                'jenis_apd' => $request->jenis_apd,
                'kategori' => $request->kategori,
                'jumlah' => $request->jumlah,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('stok-apd.index')->with('success', 'Stok baru berhasil ditambahkan.');
        }


        public function update(Request $request, $id)
        {
            $request->validate([
                'jumlah' => 'required|integer|min:0',
            ]);

            DB::table('stok_apd')->where('id', $id)->update([
                'jumlah' => $request->jumlah,
                'updated_at' => now(),
            ]);

            return redirect()->route('stok-apd.index')->with('success', 'Stok berhasil diperbarui.');
        }

        public function destroy($id)
        {
            $stok = StokAPD::findOrFail($id);
            $stok->delete();

            return back()->with('success', 'Stok APD berhasil dihapus.');
        }
    }

