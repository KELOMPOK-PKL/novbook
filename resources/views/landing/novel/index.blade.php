<x-landing-layout>
    <!-- Container for demo purpose -->
    <div class="container my-24 mx-auto md:px-6">
        <!-- Section: Design Block -->
        <section class="mb-32">
            <div
                class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                <div class="flex flex-wrap items-center">
                    <div class=" w-full shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12 ">
                        <img src="{{ asset('storage/' . $novel->image) }}" alt="..."
                            class="w-full rounded-t-lg lg:rounded-tr-none lg:rounded-bl-lg" />
                    </div>
                    <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                        <div class="px-6 py-12 md:px-12">
                            <h2 class="mb-20 text-2xl font-bold">
                                {{ $novel->title }}
                            </h2>
                            <p class="mb-6 text-neutral-500 dark:text-neutral-300">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Earum maxime voluptas ipsam aliquam itaque cupiditate
                                provident architecto expedita harum culpa odit, inventore rem
                                molestias laborum repudiandae corporis pariatur quo eius iste!
                                Quaerat, assumenda voluptates! Molestias, recusandae? Maxime
                                fuga omnis ducimus.
                            </p>
                            <div class="grid grid-cols-3 gap-1">
                                <p class="text-neutral-800 dark:text-neutral-300 mt-10">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
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
        </section>
        <!-- Section: Design Block -->
    </div>
    <!-- Container for demo purpose -->
</x-landing-layout>
