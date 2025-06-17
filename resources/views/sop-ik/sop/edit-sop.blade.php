<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit SOP
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-3xl mx-auto">
        {{-- Form Edit SOP --}}
        <form action="{{ route('sop-ik.sop.update', $sop->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            {{-- No Register --}}
            <div>
                <label for="no_register" class="block font-medium text-sm text-gray-700">No Register</label>
                <input type="text" name="no_register" id="no_register" value="{{ old('no_register', $sop->no_register) }}"
                    class="form-input rounded-md shadow-sm mt-1 w-full" required>
            </div>

            {{-- Nama SOP --}}
            <div>
                <label for="nama_sop" class="block font-medium text-sm text-gray-700">Nama SOP</label>
                <input type="text" name="nama_sop" id="nama_sop" value="{{ old('nama_sop', $sop->nama_sop) }}"
                    class="form-input rounded-md shadow-sm mt-1 w-full" required>
            </div>

            {{-- Tanggal Update --}}
            <div>
                <label for="tanggal_update" class="block font-medium text-sm text-gray-700">Tanggal Update</label>
                <input type="date" name="tanggal_update" id="tanggal_update" value="{{ old('tanggal_update', $sop->tanggal_update) }}"
                    class="form-input rounded-md shadow-sm mt-1 w-full" required>
            </div>

            {{-- File SOP --}}
            <div>
                <label for="file_sop" class="block font-medium text-sm text-gray-700">Upload File Baru (PDF)</label>
                <input type="file" name="file_sop" id="file_sop"
                    class="form-input rounded-md shadow-sm mt-1 w-full">
                <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti file.</p>

                @if ($sop->file_sop)
                    <p class="mt-2 text-sm text-blue-600">
                        File saat ini:
                        <a href="{{ asset('storage/' . $sop->file_sop) }}" target="_blank" class="underline">Lihat PDF</a>
                    </p>
                @endif
            </div>

            {{-- Submit --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('sop-ik.sop.index') }}"
                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update SOP</button>
            </div>
        </form>
    </div>
</x-app-layout>
