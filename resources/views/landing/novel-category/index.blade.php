<x-landing-layout>
        <div class="w-full container">
        <div  class="font-bold text-3xl lg:p-5 text-black">
            {{ $novelCategory->title }}
            ({{ $novelCategory->novel->count() }})
        </div>

            <div class="grid md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 p-8"  data-aos="fade-up" data-aos-duration="2000" >
                @foreach ($novels as $n)
                    <x-content.card>
                        <img class="w-full h-52 md:h-72 object-cover"
                            src="{{ asset('storage/' . $n->image) }}" alt="...">
                        <div class="px-6 py-4">
                            <a href="{{ route('landing.novels.show', $n->id)}}" class="font-bold text-lg mb-2 text-black">{{ $n->title }}</a>
                            <p class="text-gray-700 text-base ">
                                {{ $n->description }}
                            </p>
                        </div>
                    </x-content.card>
                @endforeach
            </div>
            <div class="mx-8">
                {{ $novels->links('pagination::tailwind') }}
            </div>
            <br/>
        </div>
</x-landing-layout>
