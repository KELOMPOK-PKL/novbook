<x-landing-layout>

    <div class="m-8 border-gray-300 rounded-lg bg-white shadow-lg">
        <div class="p-8">
            <iframe src="{{ asset('storage/'. $chapter->pdf)}}" class="w-full h-screen"></iframe>
        </div>
    </div>
</x-landing-layout>
