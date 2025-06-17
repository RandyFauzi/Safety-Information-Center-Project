<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- DataTables CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        

       <style>
            @keyframes fadeInUp {
                0% { opacity: 0; transform: translateY(20px); }
                100% { opacity: 1; transform: translateY(0); }
            }
            .animate-fade-in-up {
                animation: fadeInUp 0.7s ease-out forwards;
            }

            @keyframes fadeInLeft {
                0% { opacity: 0; transform: translateX(-20px); }
                100% { opacity: 1; transform: translateX(0); }
            }

            @keyframes fadeInRight {
                0% { opacity: 0; transform: translateX(20px); }
                100% { opacity: 1; transform: translateX(0); }
            }

            .animate-fade-in-up {
                animation: fadeInUp 0.7s ease-out forwards;
            }

            .animate-fade-in-left {
                animation: fadeInLeft 0.7s ease-out forwards;
            }

            .animate-fade-in-right {
                animation: fadeInRight 0.7s ease-out forwards;
                animation-delay: 0.3s;
            }

            .animate-pulse-slow {
                animation: pulse 5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }
        </style>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            
                    
            <main>
                {{ $slot }}
            </main>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/alerts.js') }}"></script>
        @stack('scripts')
        
    </body>
</html>
