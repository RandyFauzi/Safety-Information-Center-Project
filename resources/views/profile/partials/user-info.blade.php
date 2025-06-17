<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informasi Pribadi') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
           
        </p>
    </header>

    <div class="mt-6 space-y-6">

        {{-- NIK --}}
        <div>
            <x-input-label for="nik" :value="__('NIK')" />
            <x-text-input id="nik" type="text" class="mt-1 block w-full bg-gray-100 cursor-not-allowed" :value="auth()->user()->nik" readonly />
        </div>

        {{-- Nama --}}
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" type="text" class="mt-1 block w-full bg-gray-100 cursor-not-allowed" :value="auth()->user()->name" readonly />
        </div>

        {{-- Jabatan --}}
        <div>
            <x-input-label for="jabatan" :value="__('Jabatan')" />
            <x-text-input id="jabatan" type="text" class="mt-1 block w-full bg-gray-100 cursor-not-allowed" :value="auth()->user()->jabatan" readonly />
        </div>

        {{-- Departemen --}}
        <div>
            <x-input-label for="departemen" :value="__('Departemen')" />
            <x-text-input id="departemen" type="text" class="mt-1 block w-full bg-gray-100 cursor-not-allowed" :value="auth()->user()->departemen" readonly />
        </div>

        {{-- Tanggal Masuk --}}
        <div>
            <x-input-label for="tanggal_masuk" :value="__('Tanggal Masuk')" />
            <x-text-input id="tanggal_masuk" type="text" class="mt-1 block w-full bg-gray-100 cursor-not-allowed"
                :value="\Carbon\Carbon::parse(auth()->user()->tanggal_masuk)->translatedFormat('d F Y')" readonly />
        </div>

    </div>
</section>
