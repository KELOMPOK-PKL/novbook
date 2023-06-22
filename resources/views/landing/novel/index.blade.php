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
        <section class="">
            <div class="h-3/4 rounded-lg bg-white shadow-lg dark:bg-neutral-700">
                <div class="flex flex-wrap items-center">
                    <div class="w-full shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                        <img src="{{ asset('storage/' . $novel->image) }}" alt="..."
                            class="container w-2/3 h-2/3 rounded-lg my-8" />
                    </div>
                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                        <div class="px-6 py-12 md:px-12">
                            <h2 class="mb-20 text-2xl font-bold text-center md:text-left">
                                {{ $novel->title }}
                            </h2>
                            <div>
                                <p class=" text-neutral-500 dark:text-neutral-300">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                    Earum maxime voluptas ipsam aliquam itaque cupiditate
                                    provident architecto expedita harum culpa odit, inventore rem
                                    molestias laborum repudiandae corporis pariatur quo eius iste!
                                    Quaerat, assumenda voluptates! Molestias, recusandae? Maxime
                                    fuga omnis ducimus.
                                </p>
                                <p class=" mt-5 font-semibold">Beri Rating</p>
                                <div class="flex justify-start items-start mt-2 ">
                                    @livewire('rating', ['novelId' => $novel->id])
                                </div>
                                <div class="grid grid-cols-3 gap-1 text-center md:text-left">
                                    <p class="text-neutral-800 dark:text-neutral-300 mt-10">
                                        <i class="fa-sharp fa-solid fa-eye"></i>
                                        {{ $novel->views_count }}
                                    </p>
                                    <p class="text-neutral-800 dark:text-neutral-300 mt-10 ">
                                        <i class="fa-solid fa-star"></i>
                                    </p>
                                    <p class="text-neutral-800 dark:text-neutral-300 mt-10 ">
                                        <i class="fa-solid fa-list"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>

    <div class="container my-24 mx-auto md:px-6">
        @livewire('rating-content', ['novelId' => $novel->id])
    </div>
</x-landing-layout>
