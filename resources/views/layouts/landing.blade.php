<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="svg" href="{{ asset('image/logo_novbook.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!----fonts---->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@1&display=swap" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset('assets/avatarStyle.css') }}"> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    {{-- @style('css') --}}
    @stack('css')

    <style>
        #my_canvas {
            width: 100%;
            height: 100%;
            overflow: auto;
            background: #ffffff;
            text-align: center;
        }

    </style>
</head>

<body class="font-poppins antialiased bg-slate-50">

    <div class="min-h-screen">
        <!-- navbar -->
        <div>
            <x-navbar.navbar class=" rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 ease-in-out">
                @foreach ($novelCategory as $category)
                    <x-navbar.dropdown-link href="{{ route('landing.category', $category->slug) }}">
                        {{ $category->title }} ({{ $category->novel->count() }})</x-navbar.dropdown-link>
                @endforeach
            </x-navbar.navbar>
        </div>


        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class=" min-h-screen pt-20 bg-slate-50">
            {{ $slot }}
        </main>

    </div>
    <!--footer -->
    <x-footer.footer />

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>


    <script>
        AOS.init();
    </script>
    @stack('js')
</body>

</html>
