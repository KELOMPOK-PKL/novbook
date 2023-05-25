<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard.home') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown title="Post" class="ml-2" :active="Str::startsWith(
        request()
            ->route()
            ->uri(),
        'post',
    )">
        <x-slot name="icon">
            <i class="fa-solid fa-folder ml-1"></i>
        </x-slot>

        <x-sidebar.sublink title="Post" href="{{ route('dashboard.post.index') }}" :active="request()->routeIs('post')" />

    </x-sidebar.dropdown>

    <x-sidebar.dropdown title="Novels" class="ml-1" :active="Str::startsWith(
        request()
            ->route()
            ->uri(),
        'post',
    )">
        <x-slot name="icon">
            <i class="fa-solid fa-folder ml-1"></i>
        </x-slot>

        <x-sidebar.sublink title="Novel" href="{{ route('dashboard.novel.index') }}" :active="request()->routeIs('novel')" />
        <x-sidebar.sublink title="Chapter" href="{{ route('dashboard.chapter.index') }}" :active="request()->routeIs('chapter')" />
        <x-sidebar.sublink title="Novel Category" href="{{ route('dashboard.novel-category.index') }}"
            :active="request()->routeIs('novel-category')" />

    </x-sidebar.dropdown>


</x-perfect-scrollbar>
