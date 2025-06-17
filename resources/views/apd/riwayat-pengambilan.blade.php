<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Pengambilan APD
        </h2>
    </x-slot>

    <!-- ✅ Wrapping Alpine Data -->
        <div class="py-6 px-4">
        <!-- Filter -->
        <form method="GET" class="mb-4 flex flex-wrap gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari NIK / Nama" class="form-input rounded-md w-52" />
            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="form-input rounded-md w-52" />
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cari</button>
        </form>

        <div class="bg-white shadow rounded overflow-x-auto">
            {{-- Tabel --}}
            <div class="overflow-x-auto bg-white rounded shadow">
                <table class="min-w-full border text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-3 py-2 border">No</th>
                            <th class="px-3 py-2 border">Tanggal</th>
                            <th class="px-3 py-2 border">NIK</th>
                            <th class="px-3 py-2 border">Nama</th>
                            <th class="px-3 py-2 border">APD Diambil</th>
                            <th class="px-3 py-2 border">Status</th>
                            <th class="px-3 py-2 border">Potongan</th>
                            <th class="px-3 py-2 border">Detail Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-2 border">{{ $data->firstItem() + $index }}</td>
                                <td class="px-3 py-2 border">{{ $item->tanggal_pengambilan }}</td>
                                <td class="px-3 py-2 border">{{ $item->nik }}</td>
                                <td class="px-3 py-2 border">{{ $item->nama }}</td>
                                <td class="px-3 py-2 border text-sm text-gray-700">
                                    @php
                                        $apds = collect([
                                            $item->sepatu,
                                            $item->helm,
                                            $item->kacamata,
                                            $item->masker,
                                            $item->earplug,
                                        ])->filter()->implode(', ');
                                    @endphp

                                    {{ $apds ?: '-' }}
                                </td>
                                <td class="px-3 py-2 border">
                                    <span class="px-2 py-1 text-xs rounded font-semibold
                                        {{ $item->status_pengambilan === 'Masa Pergantian' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $item->status_pengambilan }}
                                    </span>
                                </td>
                                <td class="px-3 py-2 border">Rp{{ number_format($item->total_potongan, 0, ',', '.') }}</td>
                                <td class="px-3 py-2 border text-center">
                                    <button
                                        onclick='showDetail(@json($item))'
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs"
                                    >
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $data->links() }}
            </div>

            {{-- MODAL DENGAN ANIMASI --}}
            <template x-if="showModal">
                <div
                    x-show="showModal"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-90"
                    class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center"
                >
                    <div class="bg-white rounded-lg p-6 w-full max-w-lg shadow-lg relative">
                        <h2 class="text-lg font-bold mb-4">Detail Pengajuan APD</h2>
                        <div class="space-y-2 text-sm text-gray-800">
                            <p><strong>NIK:</strong> <span x-text="selected.nik"></span></p>
                            <p><strong>Nama:</strong> <span x-text="selected.nama"></span></p>
                            <p><strong>Jabatan:</strong> <span x-text="selected.jabatan"></span></p>
                            <p><strong>Departemen:</strong> <span x-text="selected.departemen"></span></p>
                            <p><strong>Tanggal Pengambilan:</strong> <span x-text="selected.tanggal_pengambilan"></span></p>
                            <p><strong>Status:</strong> <span x-text="selected.status_pengambilan"></span></p>
                            <p><strong>Potongan:</strong> Rp<span x-text="Number(selected.total_potongan).toLocaleString()"></span></p>
                            <p><strong>Keterangan:</strong> <span x-text="selected.keterangan || '-'"></span></p>

                            <div class="pt-2">
                                <strong>APD Diambil:</strong>
                                <ul class="list-disc list-inside text-sm text-gray-700 mt-1">
                                    <template x-if="selected.sepatu"><li x-text="selected.sepatu"></li></template>
                                    <template x-if="selected.helm"><li x-text="selected.helm"></li></template>
                                    <template x-if="selected.kacamata"><li x-text="selected.kacamata"></li></template>
                                    <template x-if="selected.masker"><li x-text="selected.masker"></li></template>
                                    <template x-if="selected.earplug"><li x-text="selected.earplug"></li></template>
                                </ul>
                            </div>
                        </div>

                        <button @click="showModal = false"
                            class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl">&times;</button>
                    </div>
                </div>
            </template>
        </div>

    
</x-app-layout>
