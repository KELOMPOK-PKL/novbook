<x-landing-layout>
    <div class="w-full container mt-3">
        <div class="flex justify-center items-center md:p-10">
            <x-content.carousel>
                <div>
                    @foreach ($post as $p)
                        <div class="hidden duration-500 ease-linear" data-carousel-item>
                            <img src="{{ asset('storage/' . $p->image) }}"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="Wild Landscape" />
                        </div>
                    @endforeach
                </div>
            </x-content.carousel>
        </div>
        <div class="lg:mt-5 mt-3">
            <x-content.horizontal>
                @foreach ($novelCategory as $category)
                    <div class="inline-block px-3 ">
                        <div
                            class="lg:w-44 text-xs w-24 lg:text-sm mt-5 overflow-hidden rounded lg:rounded-lg shadow-md bg-gray-100 hover:shadow-lg transition-shadow duration-300 ease-in-out">
                            <div class="flex justify-center items-center">
                                <a href="{{ route('landing.category', $category->slug) }}">
                                    <p class="lg:my-4 w-full my-2 px-2 font-semibold text-gray-700 dark:text-gray-400">
                                        {{ $category->title }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </x-content.horizontal>

        </div>
        <div class="flex flex-col items-center justify-center w-full mt-4 md:flex-col">
            <hr class="w-11/12 h-0.5 lg:my-8 my-3 bg-gray-400 border-0 rounded dark:bg-gray-700">
            <div class="absolute px-4 -translate-x-1/2 bg-slate-50 left-1/2 dark:bg-gray-800">
                <p class="lg:font-bold font-semibold lg:text-2xl text-lg text-center">Category Pilihan Kami</p>
            </div>
        </div>
        <div class="mt-10">
            <a class="font-semibold text-2xl p-8 ">Cerita Pendek</a>
            <div>
                <div class="grid md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 p-8">
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($novels as $n)
                        @if ($count < 6 && $n->category->title == 'Cerita Pendek')
                            <x-content.card>
                                <a href="{{ route('landing.novels.show', $n->id)}}">
                                    <img class="w-full h-52 md:h-72 object-cover " src="{{ asset('storage/' . $n->image) }}"
                                        alt="...">
                                    <div class="px-6 py-4">
                                        <p class="font-bold text-lg mb-2">{{ $n->title }}</p>
                                        <p class="text-gray-700 text-base">
                                            {{ $n->description }}
                                        </p>
                                    </div>
                                </a>
                            </x-content.card>
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <br />
        <div>
            <a class="font-semibold text-2xl p-8 ">Artikel</a>
            <div>
                <div class="grid md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 p-8">
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($novels as $n)
                        @if ($count < 5 && $n->category->title == 'Artikel')
                            <x-content.card>
                                <a href="{{ route('landing.novels.show', $n->id)}}">
                                    <img class="w-full h-52 md:h-72 object-cover " src="{{ asset('storage/' . $n->image) }}"
                                        alt="...">
                                    <div class="px-6 py-4">
                                        <p class="font-bold text-lg mb-2">{{ $n->title }}</p>
                                        <p class="text-gray-700 text-base">
                                            {{ $n->description }}
                                        </p>
                                    </div>
                                </a>
                            </x-content.card>
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <br />
        <div>
            <a class="font-semibold text-2xl p-8 ">Misteri</a>
            <div>
                <div class="grid md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 p-8 ">
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($novels as $n)
                        @if ($count < 5 && $n->category->title == 'Misteri')
                            <x-content.card>
                                <a href="{{ route('landing.novels.show', $n->id)}}">
                                    <img class="w-full h-52 md:h-72 object-cover" src="{{ asset('storage/' . $n->image) }}"
                                        alt="...">
                                    <div class="px-6 py-4">
                                        <p class="font-bold text-lg mb-2">{{ $n->title }}</p>
                                        <p class="text-gray-700 text-base">
                                            {{ $n->description }}
                                        </p>
                                    </div>
                                </a>
                            </x-content.card>
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-landing-layout>
