<x-landing-layout>

    <div>
        <div class="flex justify-center items-center">
            <x-content.carousel>
                <div>
                    @foreach ($post as $p)
                        <div class="carousel-item duration-500 ease-in-out" data-carousel-item="active">
                            <img class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                src="{{ asset('storage/' . $p->image) }}" alt="...">
                        </div>
                    @endforeach
                </div>
            </x-content.carousel>
        </div>
        <br />
        <div>
            <x-content.horizontal>
                @foreach ($novelCategory as $category)
                    <div class="inline-block px-3">
                        <div
                            class="w-44 h-14 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
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
        <div class="grid grid-cols-4 gap-2 p-10 ">
            @foreach ($novels as $n)
                <x-content.card>
                    <img class="w-full" src="{{ asset('storage/' . $n->image) }}" alt="Mountain">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $n->title }}</div>
                        <p class="text-gray-700 text-base">
                            {{ $n->description }}
                        </p>
                    </div>
                </x-content.card>
            @endforeach
        </div>
        <br />
    </div>


</x-landing-layout>
