<nav class="fixed z-30 w-full text-gray-700 bg-white">
    <div x-data="{ open: false }"
        class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">
            <a href="{{ route('landing.home') }}"
                class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">
                <img class="object-fill h-10 w-15" src="{{ asset('image/logo_novbook4.png') }}" />
            </a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <div :class="{ 'flex': open, 'hidden': !open }"
            class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
            <x-navbar.link href="{{ route('landing.home') }}">Home</x-navbar.link>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>Category</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 bg-white rounded-md shadow ">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            <x-navbar.link href="{{ route('landing.contact.index') }}">Contact</x-navbar.link>
            <div class="ml-5">
                <button data-dropdown-toggle="dropdown" type="button" class="rounded-full border border-black">
                    <svg class="h-8 lg:h-8 p-2  text-gray-900" aria-hidden="true" focusable="false" data-prefix="far"
                        data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                        class="svg-inline--fa fa-user fa-w-14 fa-9x">
                        <path fill="currentColor"
                            d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z">
                        </path>
                    </svg>
                </button>
                <div id="dropdown"
                    class="items-stretch hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-28 ">
                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="{{ route('landing.profile.edit') }}"
                                class="block px-4 py-2 m-2 hover:rounded-md hover:bg-gray-300 cursor-pointer text-black">Profile</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('landing.logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-24 text-left px-4 py-2 m-2 hover:rounded-md hover:bg-gray-300 cursor-pointer text-black">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
