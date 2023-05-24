<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard.home') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown title="Post" :active="Str::startsWith(
        request()
            ->route()
            ->uri(),
        'post',
    )">
        <x-slot name="icon">
            <i class="fa-solid fa-folder"></i>
        </x-slot>

        <x-sidebar.sublink title="Post" href="{{ route('dashboard.post.index') }}" :active="request()->routeIs('post')" />

    </x-sidebar.dropdown>


</x-perfect-scrollbar>
