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



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>

</head>

<body class="font-sans antialiased">

    <div class="min-h-screen" style="background-color: #FAF8F1">
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
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class=" min-h-screen pt-20" style="background-color: #edededd2">
            {{ $slot }}
        </main>

    </div>
    <!--footer -->
    <x-footer.footer />

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>

</html>
