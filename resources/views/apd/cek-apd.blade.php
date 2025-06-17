    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Cek Masa Ganti APD
            </h2>
        </x-slot>

        <div class="py-6">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-6 rounded shadow">
                    {{-- Form Cek --}}
                    <form method="GET" action="{{ route('cek-apd') }}" class="flex gap-2 mb-4">
                        <input type="text" name="nik" value="{{ old('nik', $nik ?? '') }}"
                            class="w-full border border-gray-300 rounded p-2"
                            placeholder="Masukkan NIK" />
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cek</button>
                    </form>

                    {{-- Error --}}
                    @if(session('error'))
                    <div class="text-red-600 font-semibold mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                    {{-- Jika user ditemukan --}}
                    @isset($user)
                    <div class="mb-4 text-sm">
                        <div><strong>Nama:</strong> {{ $user->name }}</div>
                        <div><strong>NIK:</strong> {{ $user->nik }}</div>
                        <div><strong>Jabatan:</strong> {{ $user->jabatan }}</div>
                        <div><strong>Departemen:</strong> {{ $user->departemen }}</div>
                    </div>

                    <table class="w-full table-auto border border-gray-300 text-sm">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border p-2">APD</th>
                                <th class="border p-2">Tanggal Ambil</th>
                                <th class="border p-2">Masa Ganti</th>
                                <th class="border p-2">Sisa</th>
                                <th class="border p-2">Status</th>
                                <th class="border p-2">Potong Gaji</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $item)
                            <tr>
                                <td class="border p-2">{{ $item['apd'] }}</td>
                                <td class="border p-2">{{ $item['tglAmbil'] }}</td>
                                <td class="border p-2">{{ $item['masa'] ? $item['masa'] . ' Bulan' : '-' }}</td>
                                <td class="border p-2">{{ $item['sisa'] }}</td>
                                <td class="border p-2">{{ $item['status'] }}</td>
                                <td class="border p-2 text-{{ $item['potong'] > 0 ? 'red' : 'green' }}-600">
                                    Rp {{ number_format($item['potong'], 0, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4 text-right text-lg font-bold text-red-700">
                        Total Potong Gaji: Rp {{ number_format($totalPotong, 0, ',', '.') }}
                    </div>
                    @endisset
                </div>
            </div>
        </div>
    </x-app-layout>
