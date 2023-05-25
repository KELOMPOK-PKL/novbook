<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="svg" href="{{ asset('image/logo_novbook.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <x-navbar.navbar>
        @foreach ($novelCategory as $category)
            <x-navbar.dropdown-link href="#">{{ $category->title }}</x-navbar.dropdown-link>
        @endforeach
    </x-navbar.navbar>
    <div class="min-h-screen" style="background-color: #FAF8F1">
          <!-- navbar -->


        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="min-h-screen" style="background-color: #FAF8F1">
            {{ $slot }}
        </main>
        <x-footer.footer />
    </div>


</body>

</html>
