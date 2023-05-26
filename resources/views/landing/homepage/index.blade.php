<x-landing-layout>

    <div>
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
        <br />
       
    </div>


</x-landing-layout>
