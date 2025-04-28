@props(['title', 'section_title' => 'Menu'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
</head>

<body class="bg-gray-100 min-h-screen flex flex-col font-sans">

    <!-- Header -->
    <header x-data="{ open: false }" class="bg-green-700 text-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex items-center justify-between px-6 py-4">
            <div class="flex items-center gap-3">
                <i class="ph ph-mountains text-3xl"></i>
                <span class="text-xl font-bold">Pemesanan Tiket Pendakian</span>
            </div>
            <nav class="hidden md:flex gap-6 text-sm font-semibold">
                <a href="{{ route('dashboard') }}"
                    class="text-white hover:text-green-200 transition-all {{ request()->routeIs('dashboard') ? 'text-green-500' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('gunungs.index') }}"
                    class="text-white hover:text-green-200 transition-all {{ request()->routeIs('gunungs.index') ? 'text-green-500' : '' }}">
                    Gunung
                </a>
                <a href="{{ route('jalurs.index') }}"
                    class="text-white hover:text-green-200 transition-all {{ request()->routeIs('jalurs.index') ? 'text-green-500' : '' }}">
                    Jalur
                </a>
                <a href="{{ route('jadwal_pendakians.index') }}"
                    class="text-white hover:text-green-200 transition-all {{ request()->routeIs('jadwal_pendakians.index') ? 'text-green-500' : '' }}">
                    Jadwal
                </a>
                <a href="{{ route('pemesanans.index') }}"
                    class="text-white hover:text-green-200 transition-all {{ request()->routeIs('pemesanans.index') ? 'text-green-500' : '' }}">
                    Pemesanan
                </a>
            </nav>
            <button x-on:click="open = !open" class="block md:hidden">
                <i class="ph ph-list text-2xl"></i>
            </button>
        </div>

        <!-- Mobile menu -->
        <div x-show="open" class="md:hidden bg-green-700 text-white">
            <nav class="flex flex-col p-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="text-white hover:text-green-200 transition-all {{ request()->routeIs('dashboard') ? 'text-green-500' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('gunungs.index') }}"
                    class="text-white hover:text-green-200 transition-all {{ request()->routeIs('gunungs.index') ? 'text-green-500' : '' }}">
                    Gunung
                </a>
                <a href="{{ route('jalurs.index') }}"
                    class="text-white hover:text-green-200 transition-all {{ request()->routeIs('jalurs.index') ? 'text-green-500' : '' }}">
                    Jalur
                </a>
                <a href="{{ route('jadwal_pendakians.index') }}"
                    class="text-white hover:text-green-200 transition-all {{ request()->routeIs('jadwal_pendakians.index') ? 'text-green-500' : '' }}">
                    Jadwal
                </a>
                <a href="{{ route('pemesanans.index') }}"
                    class="text-white hover:text-green-200 transition-all {{ request()->routeIs('pemesanans.index') ? 'text-green-500' : '' }}">
                    Pemesanan
                </a>
            </nav>
        </div>
    </header>

    <main class="flex-1 container mx-auto px-6 py-8">
        @if ($section_title)
            <h1 class="text-3xl font-semibold text-green-700 mb-6">{{ $section_title }}</h1>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white text-green-600 py-6">
        <div class="container mx-auto text-center text-sm">
            &copy; {{ date('Y') }} Sistem Pemesanan Tiket Pendakian. All rights reserved.
        </div>
    </footer>
</body>
</html>