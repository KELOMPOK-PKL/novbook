<x-landing-layout>
    <div class="m-8 border-gray-300 rounded-lg bg-white shadow-lg">
        <div class="mx-10">
            <ul class="w-96">
                @foreach ($chapters as $chapter)
                <a href="{{route('landing.chapters.show',$chapter->id)}}}">
                <li class="w-full border-b-2 border-neutral-100 border-opacity-100 py-4 dark:border-opacity-50">
                   <p>{{$chapter->title}}</p>
                </li>
                </a>
                @endforeach
            </ul>
        </div>
    </div>
</x-landing-layout>
