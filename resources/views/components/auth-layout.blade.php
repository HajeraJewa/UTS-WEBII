@props(['title', 'section_title' => 'Menu', 'section_description' => ''])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@phosphor-icons/web"></script>

    <title>{{ $title }}</title>
</head>

<body class="bg-gradient-to-tr from-green-300 via-teal-200 to-cyan-200 min-h-screen flex items-center justify-center">
    <main class="max-w-md w-full mx-4 bg-white bg-opacity-90 backdrop-blur-md rounded-3xl shadow-2xl p-8">
        <div class="flex items-center justify-center mb-8 space-x-3">
            <i
                class="ph ph-mountains text-3xl text-green-700 bg-green-100 p-3 rounded-full drop-shadow-md transform transition-transform hover:scale-110"></i>
            <span
                class="font-extrabold text-2xl tracking-wide text-green-800 select-none drop-shadow-sm">MountTrip</span>
        </div>

        <section class="mb-6 text-center">
            <h1 class="text-4xl font-extrabold text-green-900 mb-2">{{ $section_title }}</h1>
            <p class="text-green-700 text-sm max-w-[22rem] mx-auto leading-relaxed">{{ $section_description }}</p>
        </section>

        <div class="border-t border-green-300 mb-6"></div>

        <section>
            {{ $slot }}
        </section>
    </main>
</body>

</html>
