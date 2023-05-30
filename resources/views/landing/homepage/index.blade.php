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
                @foreach ($novelCategory as $nc )
                <div class="inline-block px-3">
                    <div class="w-44 h-14 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div class="flex justify-center items-center mt-4">
                            <p  class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$nc->title }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </x-content.horizontal>

        </div>
        {{-- <div>
            <x-content.card>

            </x-content.card>
        </div> --}}
        <br />
    </div>


</x-landing-layout>
