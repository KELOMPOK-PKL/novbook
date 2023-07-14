<x-landing-layout>
    <div class="m-8 border-gray-300 rounded-lg bg-white shadow-lg">
        <div class=" p-8">
            <x-button class="bg-yellow-500 hover:bg-yellow-400">
                <a href="{{ route('landing.novels.show', $novel_id)}}">Kembali</a>
            </x-button>
        </div>
        <div class="m-10 grid grid-cols-2">
            <div class="left-grid">
                @foreach ($chapters as $chapter)
                @if ($chapter->id % 2 == 1)
                <a href="{{ route('landing.chapters.show', $chapter->id) }}">
                    <div class="w-3/4 border-b border-gray-300 border-opacity-300 py-4">
                        <p class="text-lg font-medium">{{ $chapter->title }}</p>
                    </div>
                </a>
                @endif
                @endforeach
            </div>
            <div class="right-grid">
                @foreach ($chapters as $chapter)
                @if ($chapter->id % 2 == 0)
                <a href="{{ route('landing.chapters.show', $chapter->id) }}">
                    <div class="w-3/4 border-b border-gray-300 border-opacity-300 py-4">
                        <p class="text-lg font-medium">{{ $chapter->title }}</p>
                    </div>
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</x-landing-layout>
