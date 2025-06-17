<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Potong Gaji APD
        </h2>
    </x-slot>

    <div class="py-6 px-4">

        {{-- ✅ Form Filter --}}
        <form method="GET" class="mb-4 flex flex-wrap md:flex-nowrap gap-2 items-center">

            {{-- Search NIK/Nama --}}
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari NIK / Nama"
                class="px-3 py-2 border rounded w-full md:w-auto" style="max-width: 200px;">

            {{-- Start Date --}}
            <input type="date" name="start_date" value="{{ request('start_date') }}"
                class="px-3 py-2 border rounded w-full md:w-auto" style="max-width: 160px;">

            {{-- End Date --}}
            <input type="date" name="end_date" value="{{ request('end_date') }}"
                class="px-3 py-2 border rounded w-full md:w-auto" style="max-width: 160px;">

            {{-- Tombol Cari --}}
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Cari
            </button>

            {{-- Tombol Reset --}}
            @if(request()->has('search') || request()->has('start_date') || request()->has('end_date'))
                <a href="{{ route('potong-gaji') }}"
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                    Reset
                </a>
            @endif
        </form>

        {{-- ✅ Badge info filter --}}
        @if(request('start_date') && request('end_date'))
            <div class="mb-4 text-sm text-gray-700 italic">
                Menampilkan data dari:
                <span class="font-medium">{{ \Carbon\Carbon::parse(request('start_date'))->format('d M Y') }}</span>
                sampai
                <span class="font-medium">{{ \Carbon\Carbon::parse(request('end_date'))->format('d M Y') }}</span>
            </div>
        @endif

        {{-- ✅ Tabel Data --}}
        <div class="bg-white shadow rounded overflow-x-auto">
            <table class="table-auto w-full text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3">NIK</th>
                        <th class="p-3">Nama</th>
                        <th class="p-3">Jabatan</th>
                        <th class="p-3">Potongan (Rp)</th>
                        <th class="p-3">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr class="border-b">
                            <td class="p-3">{{ $item->tanggal_pengambilan }}</td>
                            <td class="p-3">{{ $item->nik }}</td>
                            <td class="p-3">{{ $item->nama }}</td>
                            <td class="p-3">{{ $item->jabatan }}</td>
                            <td class="p-3 text-red-600 font-semibold">
                                Rp{{ number_format($item->total_potongan, 0, ',', '.') }}
                            </td>
                            <td class="p-3">{{ $item->keterangan ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-3 text-center text-gray-500">Tidak ada data potong gaji ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ✅ Pagination --}}
        <div class="mt-4">
            {{ $data->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
