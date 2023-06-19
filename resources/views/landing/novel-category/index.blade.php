<x-landing-layout>
        <div class="w-full container">
        <div  class="font-bold text-3xl lg:p-5 ">
            {{ $novelCategory->title }}
            ({{ $novelCategory->novel->count() }})
        </div>

            <div class="grid md:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 p-8 ">
                @foreach ($novels as $n)
                    <x-content.card>
                        <img class="w-full h-52 md:h-72 object-cover hover:shadow-xl transition-shadow duration-300 ease-in-out"
                            src="{{ asset('storage/' . $n->image) }}" alt="...">
                        <div class="px-6 py-4">
                            <div class="font-bold text-lg  mb-2">{{ $n->title }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $n->description }}
                            </p>
                        </div>
                    </x-content.card>
                @endforeach
            </div>
            <div>
                {{ $novels->links('pagination::tailwind') }}
            </div>
        </div>
</x-landing-layout>
