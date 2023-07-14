<x-landing-layout>
    <div class="w-full mt-3">
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
        <div class="lg:mt-5 mt-3 ">
            <x-content.horizontal>
                @foreach ($novelCategory as $category)
                    <div class="inline-block px-3 ">
                        <div
                            class="lg:w-44 text-xs w-24 lg:text-sm mt-5 overflow-hidden rounded lg:rounded-lg shadow-md bg-white hover:shadow-lg transition-shadow duration-300 ease-in-out">
                            <div class="flex justify-center items-center">
                                <a href="{{ route('landing.category', $category->slug) }}">
                                    <p class="lg:my-4 w-full my-2 px-2 font-semibold text-black ">
                                        {{ $category->title }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </x-content.horizontal>

        </div>
        <div class="flex flex-col items-center justify-center w-full mt-4 md:flex-col container">
            <hr class="w-11/12 h-0.5 lg:my-8 my-3 bg-black border-0 rounded ">
            <div class="absolute px-4 -translate-x-1/2 bg-slate-50 left-1/2 ">
                <p class="lg:font-bold font-semibold lg:text-2xl text-lg text-center text-black">Category Pilihan Kami</p>
            </div>
        </div>
        <div class="mt-10 container ">
            <a class="font-semibold text-2xl p-8 text-black">Cerita Pendek</a>
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
                                        <p class="font-bold text-lg mb-2 text-black">{{ $n->title }}</p>
                                        <p class="text-gray-700 text-base line-clamp-2">
                                            {{ $n->description }}
                                        </p>
                                        <p class="text-sm text-amber-400">{{ $n->writer }}</p>
                                        <div class="flex flex-wrap text-xs mt-2">
                                            <p>
                                                <i class="fa-sharp fa-solid fa-eye"></i>
                                                {{ $n->views_count > 1000 ? number_format($n->views_count / 1000, 1, ',', '.') : $n->views_count }}
                                                @if ($n->views_count > 1000)
                                                    k
                                                @endif
                                            </p>
                                            <p>
                                                <i class="fa-solid fa-list pl-3"></i>
                                                {{ $n->chapters->count() }}
                                            </p>
                                        </div>
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
        <div class="bg-slate-100">
            <div class="container">
                <div>
                    <p class="font-semibold text-2xl text-black pt-8 px-8">Horor</p>
                </div>
                <div class="grid md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 p-8">
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($novels as $n)
                        @if ($count < 6  && $n->category->title == 'Horor')
                            <div class="rounded-lg overflow-hidden bg-slate-100 bg-cover bg-no-repeat">
                                <a href="{{ route('landing.novels.show', $n->id)}}">
                                    <img class="w-full h-52 md:h-72 object-cover rounded-lg" src="{{ asset('storage/' . $n->image) }}"
                                        alt="...">
                                    <div class=" py-4">
                                        <p class="font-bold text-lg mb-2 text-black">{{ $n->title }}</p>
                                        <p class="text-gray-700 text-base line-clamp-2">
                                            {{ $n->description }}
                                        </p>
                                       <p class="text-sm text-amber-400">{{ $n->writer }}</p>
                                        <div class="flex flex-wrap text-xs mt-2">
                                            <p>
                                                <i class="fa-sharp fa-solid fa-eye"></i>
                                                {{ $n->views_count > 1000 ? number_format($n->views_count / 1000, 1, ',', '.') : $n->views_count }}
                                                @if ($n->views_count > 1000)
                                                    k
                                                @endif
                                            </p>
                                            <p>
                                                <i class="fa-solid fa-list pl-3"></i>
                                                {{ $n->chapters->count() }}
                                            </p>
                                        </div>

                                    </div>
                                </a>
                            </div>
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
            <div class="container">
                <a class="font-semibold text-2xl p-8 text-black">Misteri</a>
                <div>
                    <div class="grid md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 p-8 ">
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($novels as $n)
                            @if ($count < 6 && $n->category->title == 'Misteri')
                                <x-content.card>
                                    <a href="{{ route('landing.novels.show', $n->id)}}">
                                        <img class="w-full h-52 md:h-72 object-cover" src="{{ asset('storage/' . $n->image) }}"
                                            alt="...">
                                        <div class="px-6 py-4">
                                            <p class="font-bold text-lg mb-2 text-black">{{ $n->title }}</p>
                                            <p class="text-gray-700 text-base line-clamp-2">
                                                {{ $n->description }}
                                            </p>
                                            <p class="text-sm text-amber-500">{{ $n->writer }}</p>
                                        <div class="flex flex-wrap text-xs mt-2">
                                            <p>
                                                <i class="fa-sharp fa-solid fa-eye"></i>
                                                {{ $n->views_count > 1000 ? number_format($n->views_count / 1000, 1, ',', '.') : $n->views_count }}
                                                @if ($n->views_count > 1000)
                                                    k
                                                @endif
                                            </p>
                                            <p>
                                                <i class="fa-solid fa-list pl-3"></i>
                                                {{ $n->chapters->count() }}
                                            </p>
                                        </div>
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

    </div>
</x-landing-layout>
