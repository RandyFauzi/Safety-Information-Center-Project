<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah SOP Baru
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-3xl mx-auto">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mt-2 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sop-ik.sop.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf

            <div>
                <label for="no_register" class="block text-sm font-medium text-gray-700">No Register</label>
                <input type="text" name="no_register" id="no_register" value="{{ old('no_register') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label for="nama_sop" class="block text-sm font-medium text-gray-700">Nama SOP</label>
                <input type="text" name="nama_sop" id="nama_sop" value="{{ old('nama_sop') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label for="tanggal_terbit">Tanggal Terbit</label>
                <input type="date" name="tanggal_terbit" id="tanggal_terbit"
                    value="{{ old('tanggal_terbit') }}"
                    class="form-input w-full rounded-md" required>

            <div>
                <label for="file_sop" class="block text-sm font-medium text-gray-700">Upload File PDF</label>
                <input type="file" name="file_sop" id="file_sop" accept="application/pdf"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <p class="text-xs text-gray-500 mt-1">File harus berupa PDF maksimal 5MB.</p>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('sop-ik.sop.index') }}"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 mr-2 text-sm">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                    Simpan SOP
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
