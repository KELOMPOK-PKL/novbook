<x-landing-layout>

    <div class="w-full container">
        <div class="flex justify-center items-center">
            <x-content.carousel>
                <div>
                    @foreach ($post as $p)
                        <div class="hidden duration-500 ease-linear" data-carousel-item>
                            <img src="{{ asset('storage/' . $p->image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Wild Landscape" />
                        </div>
                    @endforeach
                </div>
            </x-content.carousel>


        </div>
        <br />
        <div>

            <x-content.horizontal>
                @foreach ($novelCategory as $category)
                    <div class="inline-block px-3 ">
                        <div
                            class="lg:w-44 w-40 h-14 mt-10 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                            <div class="flex justify-center items-center mt-4">
                                <a href="{{ route('landing.category', $category->slug) }}">
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $category->title }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </x-content.horizontal>

        </div>
        <br />
        <div >
            <div class="grid md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-5 ">
                @php
                    $count = 0;
                @endphp
                @foreach ($novels as $n)
                    @if ($count < 4 && $n->category->slug === "artikel")
                        <x-content.card>
                            <img class="w-full h-48 md:h-64 object-cover hover:shadow-xl transition-shadow duration-300 ease-in-out"
                                src="{{ asset('storage/' . $n->image) }}" alt="...">
                            <div class="px-6 py-4">
                                <div class="font-bold text-lg  mb-2">{{ $n->title }}</div>
                                <p class="text-gray-700 text-base">
                                    {{ $n->description }}
                                </p>
                            </div>
                        </x-content.card>
                    @endif
                @endforeach
            </div>
        </div>

        <br />
    </div>


</x-landing-layout>
