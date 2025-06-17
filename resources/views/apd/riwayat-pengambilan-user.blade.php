<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            APD-Ku (Riwayat Pengambilan)
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <p class="text-sm text-gray-600 mb-4">
                    Berikut adalah riwayat pengambilan APD berdasarkan akun Anda (NIK: 
                    <span class="font-semibold text-gray-900">{{ Auth::user()->nik }}</span>)
                </p>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Jenis APD</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Potongan Gaji (Rp)</th>
                                <th class="px-4 py-2">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($data as $item)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($item->tanggal_pengambilan)->translatedFormat('d M Y') }}
                                    </td>
                                    <td class="px-4 py-2">
                                        @if($item->helm) <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Helm</span> @endif
                                        @if($item->sepatu) <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Sepatu</span> @endif
                                        @if($item->kacamata) <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Kacamata</span> @endif
                                        @if($item->masker) <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Masker</span> @endif
                                        @if($item->earplug) <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Earplug</span> @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                            {{ $item->status_pengambilan === 'Potong Gaji' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                            {{ $item->status_pengambilan }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 text-gray-700">
                                        @if ($item->status_pengambilan === 'Potong Gaji')
                                            Rp{{ number_format($item->total_potongan, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-gray-600">{{ $item->keterangan ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center px-4 py-4 text-gray-500">Belum ada riwayat pengambilan APD.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <div class="mt-10">
                    <h2 class="text-lg font-semibold mb-4 mt-10">Status Kesehatan APD</h2>
                    @include('apd.animasiAPD.apd-status')
                </div>

                <div class="mt-4">
                    {{ $data->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
