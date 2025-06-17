<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard SOP & IK
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        {{-- 🔍 Filter & Tombol Tambah --}}
        <div class="flex flex-wrap justify-between items-center gap-4 mb-4">
            <form method="GET" class="flex flex-wrap gap-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari No Register / Nama SOP"
                    class="form-input rounded-md w-64" />
                <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                    class="form-input rounded-md w-52" />
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cari</button>
            </form>

            <a href="{{ route('sop-ik.sop.create') }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
                + Tambah SOP
            </a>
        </div>

        <div class="bg-white shadow rounded overflow-x-auto">
            {{-- 📋 Tabel Data SOP --}}
            <table class="min-w-full border text-sm text-left">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-3 py-2 border">No</th>
                        <th class="px-3 py-2 border">No Register</th>
                        <th class="px-3 py-2 border">Nama SOP</th>
                        <th class="px-3 py-2 border">Tanggal Update</th>
                        <th class="px-3 py-2 border">File</th>
                        <th class="px-3 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sops as $index => $sop)
                        <tr class="hover:bg-gray-50">
                            <td class="px-3 py-2 border">{{ $sops->firstItem() + $index }}</td>
                            <td class="px-3 py-2 border">{{ $sop->no_register }}</td>
                            <td class="px-3 py-2 border">{{ $sop->nama_sop }}</td>
                            <td class="px-3 py-2 border">{{ \Carbon\Carbon::parse($sop->tanggal_update)->format('d M Y') }}</td>
                            <td class="px-3 py-2 border">
                                <a href="{{ asset('storage/' . $sop->file_sop) }}" target="_blank"
                                    class="text-blue-600 underline text-sm">Lihat PDF</a>
                            </td>
                            <td class="px-3 py-2 border space-x-2">
                                <a href="{{ route('sop-ik.sop.edit', $sop->id) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">Edit</a>
                                <form action="{{ route('sop-ik.sop.destroy', $sop->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus SOP ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($sops->isEmpty())
                        <tr>
                            <td colspan="6" class="px-3 py-4 text-center text-gray-500">Data SOP belum tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            {{-- 📄 Pagination --}}
            <div class="mt-4">
                {{ $sops->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
