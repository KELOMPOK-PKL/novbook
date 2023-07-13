<section class="">
    <div class="h-3/4 rounded-lg bg-white shadow-lg">
        <div class="flex flex-wrap items-center">
            <div class="w-full shrink-0 grow-0 basis-auto lg:flex lg:w-6/12 xl:w-4/12">
                <img src="{{ asset('storage/' . $novel->image) }}" alt="..."
                    class="container w-2/3 h-2/3 rounded-lg my-8" />
            </div>
            <div class="w-full shrink-0 grow-0 basis-auto lg:w-6/12 xl:w-8/12">
                <div class="px-6 py-12 md:px-12">
                    <h2 class="mb-6 text-2xl font-bold text-center md:text-left text-black">
                        {{ $novel->title }}
                    </h2>
                    <div>
                        <p class=" text-gray-800">
                            {{ $novel->description }}
                        </p>
                        <p class=" mt-5 font-semibold text-black">Beri Rating</p>
                        <div class="flex justify-start items-start mt-2 ">
                            <span class="flex flex-row-reverse">
                                {{-- <h4 class="font-bold">Rating</h4> --}}
                                <div class="flex flex-col w-full">
                                    <div class="rating">
                                        <input type="hidden" name="rating" wire:model="rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <button wire:click="setRating({{ $i }})" class="">
                                                <svg class=" {{ $rating >= $i ? 'text-yellow-400' : 'text-gray-300' }} cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 duration-100 "
                                                    width="23" height="23" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                                    </path>
                                                </svg>
                                            </button>
                                        @endfor
                                    </div>

                                    @if ($showCommentForm == true)
                                        <div class="my-5 flex flex-col">
                                            <textarea name=""
                                                class="p-2 w-full border-gray-400 rounded-md focus:border-gray-400 focus:ring
                                       focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white text-black"
                                                id="" cols="80" rows="5" wire:model="comment"></textarea>
                                            <button
                                                class="mt-2 w-24 text-center items-center px-4 py-2 bg-green-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                                wire:click="submit" type="submit">Simpan</button>
                                        </div>
                                    @endif
                                </div>
                            </span>

                        </div>
                        <div class="grid grid-cols-3 gap-1 text-center md:text-left">
                            <p class="text-neutral-800 mt-10">
                                <i class="fa-sharp fa-solid fa-eye"></i>
                                {{ $novel->views_count > 1000 ? number_format($novel->views_count / 1000, 1, ',', '.') : $novel->views_count }}
                                @if ($novel->views_count > 1000)
                                    k
                                @endif
                            </p>
                            <p class="text-neutral-800 mt-10 ">
                                <i class="fa-solid fa-star"></i>
                                {{ $averageRating }}
                            </p>
                            <p class="text-neutral-800 mt-10 ">
                                <a href="{{ route('landing.chapters.index', $novel->id) }}"> <i
                                        class="fa-solid fa-list"></i> </a>
                                {{ $novel->chapters->count() }}
                            </p>
                        </div>
                        <div class="mt-8">
                            <x-button >
                                <a href="{{route('landing.chapters.show', $novel->id)}}">Mulai Membaca</a>
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
