<x-landing-layout>
    <div class="m-8 border-gray-300 rounded-lg bg-white shadow-lg">
       <div class="p-5">
        <x-button variant="ligth" href="{{ route('landing.chapters.index')}}" class="m-5">
            back
        </x-button>
       </div>
       <div>
        <canvas id="my_canvas"></canvas>
       </div>

        {{-- <div class="p-8">
            <iframe src="{{ asset('storage/'. $chapter->pdf)}}#toolbar=0" class="w-full h-screen"></iframe>
        </div> --}}
    </div>
    
</x-landing-layout>
