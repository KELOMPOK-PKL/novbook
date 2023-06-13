<x-landing-layout>

    <div>
        <div class="flex justify-center items-center">
            <x-content.carousel>
                <div>
                    @foreach ($post as $p)
                        <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                            data-te-carousel-item data-te-carousel-active>
                            <img src="{{ asset('storage/' . $p->image) }}" class="block w-full" alt="Wild Landscape" />
                        </div>
                    @endforeach
                </div>
            </x-content.carousel>


        </div>
        <br />
        <div >

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

        <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-2 lg:grid-cols-5 gap-5 bg-black p-5">
            @foreach ($novels as $n)
                <x-content.card>
                    <img class="w-full h-64 object-cover" src="{{ asset('storage/' . $n->image) }}" alt="Mountain">
                    <div class="px-6 py-4">
                        <div class="font-bold text-lg  mb-2">{{ $n->title }}</div>
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
