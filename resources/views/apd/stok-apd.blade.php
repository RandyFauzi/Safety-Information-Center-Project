<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Stok APD
        </h2>
    </x-slot>

    <div class="py-6 px-4" x-data="{ showTambah: false, showEdit: false, selected: {} }">

        {{-- TOMBOL TAMBAH + FORM POPUP TAMBAH --}}
        <div class="flex justify-end mb-4">
            <button @click="showTambah = true" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah APD</button>
        </div>

        <template x-if="showTambah">
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded shadow w-full max-w-md relative">
                    <h2 class="text-lg font-bold mb-4">Tambah Stok APD</h2>
                    <form method="POST" action="{{ route('stok-apd.store') }}" class="space-y-3">
                        @csrf
                        <input type="text" name="kode_apd" placeholder="Kode APD" class="form-input w-full rounded-md" required>
                        <input type="text" name="jenis_apd" placeholder="Jenis APD" class="form-input w-full rounded-md" required>
                        <input type="text" name="kategori" placeholder="Kategori (Helm/Sepatu...)" class="form-input w-full rounded-md" required>
                        <input type="number" name="jumlah" min="0" placeholder="Jumlah" class="form-input w-full rounded-md" required>
                        <div class="text-right">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                            <button type="button" @click="showTambah = false" class="ml-2 text-gray-500 hover:underline">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </template>

        {{-- TABEL STOK --}}
        <div class="bg-white shadow rounded overflow-x-auto text-xs">
            <table class="min-w-full border">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-2 py-1 border">No</th>
                        <th class="px-2 py-1 border">Jenis APD</th>
                        <th class="px-2 py-1 border">Kategori</th>
                        <th class="px-2 py-1 border">Jumlah</th>
                        <th class="px-2 py-1 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($stok as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-2 py-1 border">{{ $stok->firstItem() + $index }}</td>
                            <td class="px-2 py-1 border">{{ $item->jenis_apd }}</td>
                            <td class="px-2 py-1 border">{{ $item->kategori }}</td>
                            <td class="px-2 py-1 border">{{ $item->jumlah }}</td>
                            <td class="px-2 py-1 border">
                                <button 
                                    @click="selected = @js($item); showEdit = true" 
                                    class="text-blue-600 hover:underline text-xs">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-3 text-gray-500">Belum ada data stok APD.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="mt-4">
            {{ $stok->links() }}
        </div>

        {{-- MODAL EDIT --}}
        <template x-if="showEdit">
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded shadow w-full max-w-md relative">
                    <h2 class="text-lg font-bold mb-4">Edit Stok APD</h2>
                    <form method="POST" :action="`/stok-apd/${selected.id}`">
                        @csrf @method('PUT')
                        <label class="block text-sm mb-1">Jumlah</label>
                        <input type="number" name="jumlah" :value="selected.jumlah" min="0" class="form-input w-full rounded-md" required>
                        <div class="mt-4 text-right">
                            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
                            <button type="button" @click="showEdit = false" class="ml-2 text-gray-500 hover:underline">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </template>
         <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <script>
            const stok = @json($stok);
        </script>
        
    </div>
</x-app-layout>
