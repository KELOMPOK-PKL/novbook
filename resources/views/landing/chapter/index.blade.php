<x-landing-layout>
    <div class="m-8 border-gray-300 rounded-lg bg-white shadow-lg">
        <div class="m-10">
            <ul class="w-full m-5">
                @foreach ($chapters as $chapter)
                <a href="{{route('landing.chapters.show',$chapter->id)}}}">
                <li class="w-full border-b-2 border-gray-100 border-opacity-100 py-4  ">
                   <p class="ml-5">{{$chapter->title}}</p>
                </li>
                </a>
                @endforeach
            </ul>
        </div>
    </div>
</x-landing-layout>
