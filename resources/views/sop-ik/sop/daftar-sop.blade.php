<x-app-layout>
    <div class="animate-fade-in-up">

        <!-- HEADER SECTION BIRU -->
        <section class="relative bg-gradient-to-r from-blue-700 via-blue-600 to-blue-500 py-24 text-white overflow-hidden">
            <!-- DEKORASI BULATAN BLUR -->
            <div class="absolute -top-32 -left-32 w-[500px] h-[500px] bg-white/10 rounded-full blur-[100px]"></div>
            <div class="absolute -bottom-40 -right-40 w-[600px] h-[600px] bg-white/5 rounded-full blur-[140px]"></div>

            <!-- KONTEN HEADER -->
            <div class="relative z-10 max-w-5xl mx-auto text-center px-4">
                <!-- ICON SVG -->
                <div class="mb-6 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 6V4m0 16v-2m8-6h-2M6 12H4m15.364-5.364l-1.414 1.414M6.05 17.95l-1.414 1.414M17.95 17.95l-1.414-1.414M6.05 6.05L7.464 7.464M12 8a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>
                </div>

                <!-- JUDUL DAN DESKRIPSI -->
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Daftar SOP Perusahaan</h1>
                <p class="text-lg md:text-xl text-white/80">Akses dan pelajari SOP penting dengan tampilan yang nyaman dan profesional.</p>
            </div>
        </section>


        <!-- FILTER & CONTENT SECTION -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6 flex gap-10">

                <!-- Sidebar Filter -->
                <aside class="w-1/5 hidden md:block">
                    <h2 class="text-lg font-semibold mb-4 text-blue-800">Filter Departemen</h2>
                    <form method="GET" action="{{ route('sop-ik.sop.daftar') }}" class="space-y-3">
                        @foreach ($departemens as $dept)
                            <div class="flex items-center">
                                <input type="checkbox" name="departemen[]" value="{{ $dept }}"
                                    {{ request()->has('departemen') && in_array($dept, request()->departemen) ? 'checked' : '' }}
                                    class="form-checkbox text-blue-600 rounded mr-2">
                                <label>{{ $dept }}</label>
                            </div>
                        @endforeach
                        <button type="submit"
                            class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white text-sm py-2 rounded shadow">
                            Terapkan Filter
                        </button>
                    </form>
                </aside>

                <!-- Main SOP List -->
                <div class="w-full md:w-4/5">

                    <!-- Search Bar -->
                    <form method="GET" class="flex mb-6 gap-4 items-center">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari SOP berdasarkan nama atau nomor register..."
                            class="w-full px-4 py-2 rounded border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500">
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cari</button>
                    </form>

                    <!-- SOP Cards -->
                    @forelse ($sops as $sop)
                        <div class="bg-white rounded-xl p-6 shadow mb-6 hover:shadow-md transition">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-semibold text-blue-800 mb-1">{{ $sop->nama_sop }}</h3>
                                    <p class="text-sm text-gray-600">No. Register: <span class="font-medium">{{ $sop->no_register }}</span></p>
                                    <p class="text-sm text-gray-500 mt-1">Diterbitkan: {{ \Carbon\Carbon::parse($sop->tanggal_terbit)->format('d M Y') }}</p>
                                </div>
                                <a href="{{ asset('storage/' . $sop->file_sop) }}" target="_blank"
                                    class="text-blue-600 hover:underline font-semibold">Lihat SOP ↗</a>
                            </div>
                        </div>
                    @empty
                        <div class="text-gray-500">Tidak ada SOP ditemukan.</div>
                    @endforelse

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $sops->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
