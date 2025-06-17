<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pengajuan APD
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

                <form id="form-apd" action="{{ route('pengajuan-apd.store') }}" method="POST">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium">NIK</label>
                            <input type="text" name="nik" id="nik" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Nama</label>
                            <input type="text" name="nama" id="nama" class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Departemen</label>
                            <input type="text" name="departemen" id="departemen" class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
                        </div>
                    </div>

                    <div class="border p-4 rounded-md shadow-sm">
                        <label class="flex items-center space-x-3">
                            <input type="checkbox" id="check_sepatu" name="apd[sepatu]" value="1" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="text-lg font-medium">Sepatu Safety</span>
                        </label>
                        <select id="detail_sepatu" name="detail[sepatu]" class="mt-2 w-full border rounded px-3 py-2">
                            <option value="">Pilih Ukuran</option>
                            <option value="Sepatu Safety No 1">No 1</option>
                            <option value="Sepatu Safety No 2">No 2</option>
                            <option value="Sepatu Safety No 3">No 3</option>
                            <option value="Sepatu Safety No 4">No 4</option>
                            <option value="Sepatu Safety No 5">No 5</option>
                            <option value="Sepatu Safety No 6">No 6</option>
                        </select>
                    </div>

                        <div class="border p-4 rounded-md shadow-sm">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="check_helm" name="apd[helm]" value="1" class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="text-lg font-medium">Helm Safety</span>
                            </label>
                            <select id="detail_helm" name="detail[helm]" class="mt-2 w-full border rounded px-3 py-2">
                                <option value="">Pilih Warna</option>
                                <option value="Helm Safety Biru">Biru</option>
                                <option value="Helm Safety Kuning">Kuning</option>
                                <option value="Helm Safety Orange">Orange</option>
                                <option value="Helm Safety Putih">Putih</option>
                                <option value="Helm Safety Hijau">Hijau</option>
                            </select>
                        </div>

                        <div class="border p-4 rounded-md shadow-sm">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="check_kacamata" name="apd[kacamata]" value="1" class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="text-lg font-medium">Kacamata Safety</span>
                            </label>
                            <select id="detail_kacamata" name="detail[kacamata]" class="mt-2 w-full border rounded px-3 py-2">
                                <option value="">Pilih Tipe</option>
                                <option value="Kacamata Safety - Namesis">Namesis</option>
                                <option value="Kacamata Safety - Hitam">Hitam</option>
                            </select>
                        </div>

                        <div class="border p-4 rounded-md shadow-sm">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="check_masker" name="apd[masker]" value="1" class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="text-lg font-medium">Masker</span>
                            </label>
                        </div>

                        <div class="border p-4 rounded-md shadow-sm">
                            <label class="flex items-center space-x-3">
                                <input type="checkbox" id="check_earplug" name="apd[earplug]" value="1" class="form-checkbox h-5 w-5 text-blue-600">
                                <span class="text-lg font-medium">Earplug</span>
                            </label>
                        </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium">Keterangan Tambahan (Opsional)</label>
                        <textarea name="keterangan" class="w-full border rounded px-3 py-2" rows="3"></textarea>
                    </div>

                    <div class="text-center mt-8">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-full transition">
                            Kirim Pengajuan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // 1. Auto-Fill berdasarkan NIK
        document.getElementById('nik').addEventListener('blur', function () {
            const nik = this.value;

            if (nik.length >= 6) {
                fetch(`{{ route('get-user-by-nik') }}?nik=${nik}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log("Data fetched:", data);
                        if (data.success) {
                            document.getElementById('nama').value = data.nama;
                            document.getElementById('jabatan').value = data.jabatan;
                            document.getElementById('departemen').value = data.departemen;
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'NIK Tidak Ditemukan',
                                text: 'Pastikan NIK sesuai dengan data karyawan.',
                            });

                            document.getElementById('nama').value = '';
                            document.getElementById('jabatan').value = '';
                            document.getElementById('departemen').value = '';
                        }
                    })
                    .catch(err => {
                        console.error('Error fetch NIK:', err);
                        Swal.fire('Error', 'Gagal mengambil data karyawan.', 'error');
                    });
            }
        });

        document.getElementById('form-apd').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = this;
            const formData = new FormData(form);

            fetch(`{{ route('preview-potongan') }}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const catatanList = data.catatan.map(item => `<div>${item}</div>`).join('');
                    Swal.fire({
                        title: 'Konfirmasi Pengajuan',
                        html: `
                            ${catatanList}
                            <br><strong>Total Potongan: Rp ${Number(data.total_potongan).toLocaleString('id-ID')}</strong>
                        `,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, kirim',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('form-apd').submit();
                        }
                    });
                } else {
                    Swal.fire('Error', data.message || 'Gagal mengecek potongan.', 'error');
                }
            })
            .catch(error => {
                console.error(error);
                Swal.fire('Gagal', 'Terjadi kesalahan.', 'error');
            });
         });
    </script>

    {{-- 3. SweetAlert Sukses --}}
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
        });
        setTimeout(() => {
                document.getElementById('form-apd').reset();
            }, 2500);
    </script>
    @endif

    {{-- 4. SweetAlert Gagal --}}
    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK',
            });
        });
    </script>
    @endif
</x-app-layout>
