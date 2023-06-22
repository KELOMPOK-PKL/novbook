<span class="flex flex-row-reverse">
    {{-- <h4 class="font-bold">Rating</h4> --}}
    <div class="flex flex-col w-full">
        <div class="rating">
            <input type="hidden" name="rating" wire:model="rating">
            @for ($i = 1; $i <= 5; $i++)
                <button wire:click="setRating({{ $i }})" class="">
                    <svg class=" {{ $rating >= $i ? 'text-yellow-400' : 'text-gray-300' }} cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 duration-100 "
                        width="23" height="23" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                        </path>
                    </svg>
                </button>
            @endfor
        </div>

        @if ($showCommentForm == true)
            <div class="my-5 flex flex-col">
                <textarea name=""
                    class="py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
           focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
           dark:text-gray-300 dark:focus:ring-offset-dark-eval-1"
                    id="" cols="80" rows="5" wire:model="comment"></textarea>
                <button
                    class="mt-2 w-1/6 text-center  inline-flex items-center px-4 py-2 bg-green-400 dark:bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-500 focus:bg-green-700 dark:focus:bg-green-500 active:bg-green-700 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150"
                    wire:click="submit" type="submit"><span class="text-center">Simpan</span></button>
            </div>
        @endif
    </div>



</span>
