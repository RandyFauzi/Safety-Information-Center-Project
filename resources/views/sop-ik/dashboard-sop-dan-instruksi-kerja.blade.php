<x-app-layout>
<div class="animate-fade-in-up">  
    <section class="relative w-full h-[400px]">
        <!-- Gambar Latar -->
        <img src="{{ asset('images/Header-Dasboard-SOPIK.jpg') }}"
            alt="Header SOP & IK"
            class="absolute inset-0 w-full h-full object-cover z-0">

        <!-- Overlay gradasi biru -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 via-blue-800/60 to-transparent z-10"></div>

        <!-- Konten di atas gambar -->
        <div class="relative z-20 h-full flex items-center px-8 md:px-20">
            <div class="text-white space-y-4 max-w-xl">
                <h1 class="text-3xl md:text-5xl font-bold leading-tight">
                    Yuk, Pahami SOP & Instruksi Kerja
                </h1>
                <p class="text-lg md:text-xl">
                    Akses dokumen penting untuk keselamatan kerja dengan lebih mudah dan cepat.
                </p>
                </a>
            </div>
        </div>
    </section>


    <section class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10">

            <!-- Card SOP -->
            <a href="#" class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all group">
                <h3 class="text-xl font-semibold text-blue-800 mb-2 group-hover:text-orange-500 transition">
                    📘 SOP (Standard Operating Procedure)
                </h3>
                <p class="text-gray-600">Prosedur kerja standar untuk memastikan keselamatan dan efisiensi.</p>
            </a>

            <!-- Card IK -->
            <a href="#" class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl hover:-translate-y-1 transition-all group">
                <h3 class="text-xl font-semibold text-blue-800 mb-2 group-hover:text-orange-500 transition">
                    📄 Instruksi Kerja (IK)
                </h3>
                <p class="text-gray-600">Panduan teknis langkah demi langkah sesuai pekerjaan harianmu.</p>
            </a>

        </div>
    </section>

    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

            <!-- Gambar + floating badge -->
            <div class="relative">
                <img src="{{ asset('images/sop-illustration.png.jpg') }}" alt="Ilustrasi SOP" class="rounded-2xl shadow-xl w-full">

                <!-- Badge floating keluar kiri bawah -->
                <div class="absolute -bottom-6 -left-6 md:-bottom-8 md:-left-8 bg-white text-blue-800 px-6 py-3 rounded-xl shadow-xl border border-blue-200">
                    <div class="text-3xl font-bold leading-tight">100+</div>
                    <div class="text-sm font-medium">Dokumen SOP & IK</div>
                </div>
            </div>


            <!-- Deskripsi pengantar -->
            <div class="space-y-4">
                <h2 class="text-2xl md:text-3xl font-bold text-blue-800">
                    Kenapa Harus Pahami SOP & Instruksi Kerja?
                </h2>
                <p class="text-gray-600 leading-relaxed">
                    Semua pekerjaan memiliki risiko. SOP dan IK disusun agar setiap karyawan mengetahui langkah kerja yang benar, aman, dan sesuai standar. Membaca SOP dan IK bukan hanya tentang kewajiban, tapi juga perlindungan bagi dirimu sendiri dan tim kerja.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-4 gap-6 text-center">

            <!-- Box 1 -->
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
                <div class="flex justify-center mb-3">
                    <svg class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2l4 -4m5 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-bold text-blue-800">Menghindari Kecelakaan</h3>
                <p class="text-sm text-gray-600 mt-2">Mengetahui risiko & langkah aman sebelum bekerja.</p>
            </div>

            <!-- Box 2 -->
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
                <div class="flex justify-center mb-3">
                    <svg class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0a9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-bold text-blue-800">Efisien & Benar</h3>
                <p class="text-sm text-gray-600 mt-2">Pekerjaan lebih cepat, minim kesalahan operasional.</p>
            </div>

            <!-- Box 3 -->
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
                <div class="flex justify-center mb-3">
                    <svg class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A13.937 13.937 0 0112 15c2.306 0 4.47.552 6.379 1.528M15 10a3 3 0 11-6 0a3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="font-bold text-blue-800">Profesional</h3>
                <p class="text-sm text-gray-600 mt-2">Membangun citra kerja yang bertanggung jawab.</p>
            </div>

            <!-- Box 4 -->
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
                <div class="flex justify-center mb-3">
                    <svg class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7h18M3 12h18M3 17h18" />
                    </svg>
                </div>
                <h3 class="font-bold text-blue-800">Standar Perusahaan</h3>
                <p class="text-sm text-gray-600 mt-2">Mengikuti SOP resmi dari Tim HSE & Manajemen.</p>
            </div>

        </div>
    </section>



    <section class="bg-gradient-to-r from-blue-700 to-indigo-800 text-white py-16 mt-12">
        <div class="max-w-4xl mx-auto text-center space-y-4">
            <h2 class="text-3xl font-bold animate-fade-in-up">Siap Jadi Lebih Aman & Profesional?</h2>
            <p class="text-lg text-blue-100">Mulai dari membaca dokumen SOP & IK yang sudah disiapkan tim HSE untukmu.</p>
            <div class="mt-6">
                <a href="#" class="bg-white text-blue-800 px-6 py-3 rounded-lg font-semibold shadow hover:bg-blue-100 transition">
                    Yuk Mulai Ketahui
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
