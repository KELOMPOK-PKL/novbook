@push('css')
    @livewireStyles
@endpush

@push('js')
    @livewireScripts
@endpush

<x-landing-layout>
    <!-- Container for demo purpose -->
    <div class="container my-10 mx-auto md:px-6">
        <!-- Section: Design Block -->
        @livewire('novel-rating', ['novelId' => $novel->id])
        <!-- Section: Design Block -->
    </div>
    <div class="absolute px-4 -translate-x-1/2 bg-slate-50 left-1/2 dark:bg-gray-800">
        <p class="lg:font-bold font-semibold lg:text-2xl text-lg text-center">Comment</p>
    </div>
    <div class="container my-24 mx-auto md:px-6">
        @livewire('rating-content', ['novelId' => $novel->id])
    </div>
</x-landing-layout>
