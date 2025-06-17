<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Data Karyawan') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4">
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- GRAFIK JUMLAH KARYAWAN AKTIF DAN TIDAK AKTIF -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:flex md:gap-6 md:justify-between mb-6">
        <!-- Total -->
        <div class="bg-white rounded-xl p-4 shadow text-blue-900 rounded-xl px-5 py-4 flex-1 shadow text-center">
            <div class="text-sm font-medium">Total Karyawan</div>
            <div class="text-2xl font-bold">{{ $totalKaryawan }}</div>
        </div>

        <div class="bg-green-100 text-green-900 rounded-xl px-5 py-4 flex-1 shadow text-center">
            <div class="text-sm font-medium">Total Aktif</div>
            <div class="text-2xl font-bold">{{ $totalAktif }}</div>
        </div>

        <div class="bg-red-100 text-red-900 rounded-xl px-5 py-4 flex-1 shadow text-center">
            <div class="text-sm font-medium">Total Tidak Aktif</div>
            <div class="text-2xl font-bold">{{ $totalTidakAktif }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <!-- Grafik Pertumbuhan -->
        <div class="bg-white rounded-xl p-4 shadow h-[300px]">
            <div class="flex justify-between items-center mb-2">
                <p class="text-sm text-gray-500 font-semibold">Pertumbuhan Karyawan Masuk per Bulan</p>
                <span class="text-xs text-gray-400">Tahun berjalan</span>
            </div>
            <canvas id="growthChart" class="w-full h-full"></canvas>
        </div>

        <!-- Grafik Departemen -->
        <div class="bg-white rounded-xl p-4 shadow h-[300px]">
            <div class="flex justify-between items-center mb-2">
                <p class="text-sm text-gray-500 font-semibold">Karyawan per Departemen</p>
                <span class="text-xs text-gray-400">%</span>
            </div>
            
            <canvas id="deptChart" class="w-full h-full"></canvas>
                <div class="w-2/3 flex items-center justify-center">
                    <canvas id="deptChart" class="max-h-[220px] w-full"></canvas>
                </div>  
            </div>
        </div>
    </div>


    <div class="flex justify-between items-center mb-4">
        <form method="GET" action="{{ route('karyawan.index') }}" class="flex flex-wrap gap-2">
            <input type="text" name="search" placeholder="Cari NIK / Nama" value="{{ request('search') }}" class="border rounded p-2" />
            <input type="text" name="jabatan" placeholder="Filter Jabatan" value="{{ request('jabatan') }}" class="border rounded p-2" />
            <input type="text" name="departemen" placeholder="Filter Departemen" value="{{ request('departemen') }}" class="border rounded p-2" />
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cari</button>
        </form>

        <form method="POST" action="{{ route('karyawan.bulk-delete') }}" id="bulk-delete-form">
        @csrf
        <div class="flex gap-2 items-center">
                <button id="bulk-delete-btn" type="submit" class="hidden bg-red-600 text-white px-3 py-2 rounded">🗑️</button>
                <button onclick="document.getElementById('modal-tambah').classList.remove('hidden')" class="bg-green-600 text-white px-4 py-2 rounded"> + Tambah Karyawan </button>
            </div>
        </div>
        </form>

            <form method="GET" action="{{ route('karyawan.index') }}" class="flex flex-wrap gap-2">
            </form>
        
        
        <table class="min-w-full bg-white border">
        <thead>
                    <tr>
                        <th class="border px-4 py-2 text-center">
                            <input type="checkbox" id="check-all">
                        </th>
                        <th class="border px-2 py-2">No</th>
                        <th class="border px-4 py-2 relative group">
                            NIK
                            <form method="GET" class="absolute right-2 top-1/2 transform -translate-y-1/2 z-10">
                                <input type="hidden" name="sort_by" value="nik">
                                <select name="sort_dir"
                                    onchange="this.form.submit()"
                                    class="appearance-none bg-transparent text-sm cursor-pointer focus:outline-none pl-5 pr-5"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill=\'%23000\' height=\'16\' viewBox=\'0 0 24 24\' width=\'16\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>'); background-repeat: no-repeat; background-position: right center; border: none;">
                                    <option value="asc" {{ request('sort_by') === 'nik' && request('sort_dir') === 'asc' ? 'selected' : '' }}>⬇</option>
                                    <option value="desc" {{ request('sort_by') === 'nik' && request('sort_dir') === 'desc' ? 'selected' : '' }}>⬆</option>
                                </select>
                            </form>
                        </th>
                        <th class="border px-4 py-2 relative group">
                            Nama
                            <form method="GET" class="absolute right-2 top-1/2 transform -translate-y-1/2 z-10">
                                <input type="hidden" name="sort_by" value="name">
                                <select name="sort_dir"
                                    onchange="this.form.submit()"
                                    class="appearance-none bg-transparent text-sm cursor-pointer focus:outline-none pl-5 pr-5"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill=\'%23000\' height=\'16\' viewBox=\'0 0 24 24\' width=\'16\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>'); background-repeat: no-repeat; background-position: right center; border: none;">
                                    <option value="asc" {{ request('sort_by') === 'name' && request('sort_dir') === 'asc' ? 'selected' : '' }}>⬇</option>
                                    <option value="desc" {{ request('sort_by') === 'name' && request('sort_dir') === 'desc' ? 'selected' : '' }}>⬆</option>
                                </select>
                            </form>
                        </th>
                        <th class="border px-4 py-2">Jabatan</th>
                        <th class="border px-4 py-2">Departemen</th>
                        <th class="border px-4 py-2 relative group">
                            Tanggal Masuk
                            <form method="GET" class="absolute right-2 top-1/2 transform -translate-y-1/2 z-10">
                                <input type="hidden" name="sort_by" value="tanggal_masuk">
                                <select name="sort_dir"
                                    onchange="this.form.submit()"
                                    class="appearance-none bg-transparent text-sm cursor-pointer focus:outline-none pl-5 pr-5"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg fill=\'%23000\' height=\'16\' viewBox=\'0 0 24 24\' width=\'16\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M7 10l5 5 5-5z\'/></svg>'); background-repeat: no-repeat; background-position: right center; border: none;">
                                    <option value="asc" {{ request('sort_by') === 'tanggal_masuk' && request('sort_dir') === 'asc' ? 'selected' : '' }}>⬇</option>
                                    <option value="desc" {{ request('sort_by') === 'tanggal_masuk' && request('sort_dir') === 'desc' ? 'selected' : '' }}>⬆</option>
                                </select>
                            </form>
                        </th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Password</th>
                        <th class="border px-4 py-2">Role</th>
                        <th class="border px-4 py-2">*</th>
                    </tr>
                </thead>


            <tbody>
                @forelse ($karyawans as $karyawan)
                    <tr>
                         <td class="border px-4 py-2 text-center">
                            <input type="checkbox" name="ids[]" value="{{ $karyawan->id }}" class="checkbox-item"></td>
                        <td class="border px-4 py-2">{{ $loop->iteration + ($karyawans->currentPage() - 1) * $karyawans->perPage() }}</td>
                        <td class="border px-4 py-2">{{ $karyawan->nik }}</td>
                        <td class="border px-4 py-2">{{ $karyawan->name }}</td>
                        <td class="border px-4 py-2">{{ $karyawan->jabatan }}</td>
                        <td class="border px-4 py-2">{{ $karyawan->departemen }}</td>
                        <td class="p-2">{{ $karyawan->tanggal_masuk ? \Carbon\Carbon::parse($karyawan->tanggal_masuk)->format('d-m-Y') : '-' }}</td>
                        <td class="border px-4 py-2">{{ $karyawan->status }}</td>
                        <td class="border px-4 py-2">{{ $karyawan->email }}</td>
                        <td class="border px-4 py-2 text-center">
                            <span id="dots-{{ $karyawan->id }}">••••••••</span>
                            <span id="realpass-{{ $karyawan->id }}" class="hidden">{{ $karyawan->password }}</span>

                            <button onclick="togglePassword('{{ $karyawan->id }}')" class="ml-2 text-blue-500 hover:text-blue-700">
                                <svg id="eye-icon-{{ $karyawan->id }}" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                            </td>
                        <td class="border px-4 py-2">{{ $karyawan->role }}</td>
                        <td class="border px-4 py-2">
                            <!-- Tombol Edit -->
                            <button
                                onclick="openEditModal(
                                '{{ $karyawan->id }}',
                                '{{ $karyawan->nik }}',
                                '{{ $karyawan->name }}',
                                '{{ $karyawan->jabatan }}',
                                '{{ $karyawan->departemen }}',
                                '{{ $karyawan->tanggal_masuk }}',
                                '{{ $karyawan->status }}',
                                '{{ $karyawan->email }}',
                                '{{ $karyawan->role }}')"
                                class="bg-yellow-400 text-white px-2 py-1 rounded text-sm"
                            >Edit</button>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1 rounded text-sm">Hapus</button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-4">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody> 
        </table>
    </form>
        
        <!-- Pop-up Modal -->
        <div id="modal-tambah" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 w-full max-w-lg mx-auto">
                <h2 class="text-xl font-bold mb-4">Tambah Karyawan</h2>
                <form method="POST" action="{{ route('karyawan.store') }}">
                    @csrf
                    <div class="mb-2">
                        <label class="block font-semibold">NIK</label>
                        <input type="text" name="nik" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Nama</label>
                        <input type="text" name="name" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Jabatan</label>
                        <input type="text" name="jabatan" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Departemen</label>
                        <input type="text" name="departemen" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Tanggal Masuk Kerja</label>
                        <input type="date" id="add-tanggal-masuk" name="tanggal_masuk"
                            class="mt-1 px-3 py-2 border rounded w-full" />
                    </div>
                    <div class="mb-2">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="add-status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                            <option value="Mutasi">Mutasi</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Email</label>
                        <input type="email" name="email" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Password</label>
                        <input type="password" name="password" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Role</label>
                        <select name="role" class="w-full border rounded p-2" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    
                    

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" onclick="document.getElementById('modal-tambah').classList.add('hidden')" class="bg-gray-400 px-4 py-2 rounded text-white">
                            Batal
                        </button>
                        <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit Karyawan -->
        <div id="modal-edit" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-bold mb-4">Edit Karyawan</h2>
                <form id="form-edit" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id">

                    <div class="mb-2">
                        <label class="block font-semibold">NIK</label>
                        <input type="text" id="edit-nik" name="nik" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Nama</label>
                        <input type="text" id="edit-name" name="name" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Jabatan</label>
                        <input type="text" id="edit-jabatan" name="jabatan" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Departemen</label>
                        <input type="text" id="edit-departemen" name="departemen" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block text-sm font-medium text-gray-700">Tanggal Masuk Kerja</label>
                        <input type="date" id="edit-tanggal-masuk" name="tanggal_masuk"
                            value="{{ old('tanggal_masuk', $karyawan->tanggal_masuk ?? '') }}"
                            class="mt-1 px-3 py-2 border rounded w-full" />  
                    </div>
                    <div class="mb-2">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="edit-status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                            <option value="Mutasi">Mutasi</option>
                            </select>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Email</label>
                        <input type="email" id="edit-email" name="email" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-semibold">Password</label>
                        <input type="password" name="password" class="w-full border rounded p-2" required>
                    </div>                    
                    <div class="mb-2">
                        <label class="block font-semibold">Role</label>
                        <select id="edit-role" name="role" class="w-full border rounded p-2" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" onclick="document.getElementById('modal-edit').classList.add('hidden')" class="bg-gray-400 px-4 py-2 rounded text-white">
                            Batal
                        </button>
                        <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-4">
            {{ $karyawans->withQueryString()->links() }}
        </div>
    </div>

    {{-- Debug Data --}}
    <pre>
    GROWTH: {{ $growthData->pluck('bulan')->implode(', ') }} |
    DEPT: {{ $chartDepartemen->pluck('departemen')->implode(', ') }}
    </pre>
    <pre>
    === DEBUG DEPT ===
    {{ json_encode($chartDepartemen) }}
    </pre>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Java Script Codes -->
    <script>
    function openEditModal(id, nik, name, jabatan, departemen, tanggal_masuk, status, email, role) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-nik').value = nik;
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-jabatan').value = jabatan;
        document.getElementById('edit-departemen').value = departemen;
        document.getElementById('edit-tanggal-masuk').value = tanggal_masuk;
        document.getElementById('edit-status').value = status;
        document.getElementById('edit-email').value = email;
        document.getElementById('edit-role').value = role;

        document.getElementById('form-edit').action = '/karyawan/' + id;
        document.getElementById('modal-edit').classList.remove('hidden');
    }

    function togglePassword(id) {
        const dots = document.getElementById('dots-' + id);
        const real = document.getElementById('realpass-' + id);
        const icon = document.getElementById('eye-icon-' + id);

        const isHidden = dots.classList.contains('hidden');

        if (isHidden) {
            // hide password
            dots.classList.remove('hidden');
            real.classList.add('hidden');
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
        } else {
            // show password
            dots.classList.add('hidden');
            real.classList.remove('hidden');
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.967 9.967 0 012.602-4.368M9.88 9.88a3 3 0 104.24 4.24M3 3l18 18" />
            `;
        }
    }
    document.getElementById('check-all').addEventListener('change', function () {
        let checkboxes = document.querySelectorAll('.checkbox-item');
        checkboxes.forEach(cb => cb.checked = this.checked);
        });

        const checkboxes = document.querySelectorAll('.checkbox-item');
        const checkAll = document.getElementById('check-all');
        const deleteBtn = document.getElementById('bulk-delete-btn');

        function updateDeleteButtonVisibility() {
            const anyChecked = [...checkboxes].some(checkbox => checkbox.checked);
            if (anyChecked) {
                deleteBtn.classList.remove('hidden');
            } else {
                deleteBtn.classList.add('hidden');
            }
        }

        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateDeleteButtonVisibility);
        });

        checkAll.addEventListener('change', () => {
            checkboxes.forEach(cb => cb.checked = checkAll.checked);
            updateDeleteButtonVisibility();
        });

    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('growthChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($growthData->pluck('bulan')) !!},
                datasets: [{
                    label: 'Jumlah Karyawan Masuk',
                    data: {!! json_encode($growthData->pluck('jumlah')) !!},
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.1)',
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    });

     document.addEventListener('DOMContentLoaded', function () {
        const deptChart = document.getElementById('deptChart')?.getContext('2d');

        if (!deptChart) {
            console.error('Elemen deptChart tidak ditemukan!');
            return;
        }

        const dataLabels = {!! json_encode($chartDepartemen->pluck('departemen')) !!};
        const dataValues = {!! json_encode($chartDepartemen->pluck('jumlah')) !!};

        if (!dataLabels.length || !dataValues.length) {
            console.warn('Data donut kosong.');
            return;
        }

        new Chart(deptChart, {
            type: 'doughnut',
            data: {
                labels: dataLabels,
                datasets: [{
                    label: 'Karyawan per Departemen',
                    data: dataValues,
                    backgroundColor: [
                        '#3B82F6', '#10B981', '#F59E0B', '#EF4444',
                        '#8B5CF6', '#EC4899', '#6366F1', '#14B8A6'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 10,
                            font: { size: 12 }
                        }
                    }
                }
            }
        });
    });

    </script>

</x-app-layout>
