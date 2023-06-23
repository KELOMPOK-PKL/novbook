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

    <div class="container my-24 mx-auto md:px-6">
        @livewire('rating-content', ['novelId' => $novel->id])
    </div>
</x-landing-layout>
