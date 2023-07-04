<div class="flex bg-white px-10 py-7  shadow-lg rounded-lg">

    <div class="w-full">
        @forelse ($ratingItems as $rating)
            <div class="flex">
                <h3 class="font-medium">{{ $rating->user->name }}</h3>
                <small
                    class="ml-2 text-sm mt-0.5 text-gray-600">{{ $rating->created_at->format('j M Y, g:i a') }}</small>
            </div>

            @for ($i = 1; $i <= 5; $i++)
                <button disabled class="mt-2">
                    <svg class=" {{ $rating->rating >= $i ? 'text-yellow-400' : 'text-gray-300' }} cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 duration-100 "
                        width="23" height="23" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                        </path>
                    </svg>
                </button>
            @endfor
            <p>{{ $rating->comment }}</p>

            @if ($showFormEdit == true)
                <div class="flex flex-col mt-6">
                    <div class="flex my-4">
                        @for ($i = 1; $i <= 5; $i++)
                            <button wire:click="setRating({{ $i }})">
                                <svg class=" {{ $i <= $newRating ? 'text-yellow-400' : 'text-gray-300' }} cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 duration-100"
                                    width="23" height="23" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                    </path>
                                </svg>
                            </button>
                        @endfor
                    </div>
                    <form class="w-3/4 flex flex-col" wire:submit.prevent="update">
                        <textarea
                            class="p-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                    focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                    dark:text-gray-300 dark:focus:ring-offset-dark-eval-1"
                            wire:model.lazy="newComment" id="" cols="80" rows="5"></textarea>
                        <button wire:click="selectEdit({{ $rating->id }})"
                            class="bg-slate-500 px-5 mt-4 py-2 rounded-lg text-white text-center">Simpan</button>
                    </form>
                </div>
            @endif
            @auth
                @if ($rating->user->id == auth()->user()->id)
                    <div class="items-end">
                        <button data-dropdown-toggle="dropdown" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 hover:text-gray-800"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>
                        @if ($rating)
                            <div id="dropdown"
                                class="items-end z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-28 dark:bg-gray-700">

                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a wire:click="selectEdit({{ $rating->id }})"
                                            class="block px-4 py-2 m-2 hover:rounded-md hover:bg-gray-300 cursor-pointer dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                    </li>
                                    <li>
                                        <a wire:click="delete({{ $rating->id }})"
                                            class="block px-4 py-2 m-2 hover:rounded-md hover:bg-gray-300 cursor-pointer dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                    </li>
                                </ul>

                            </div>
                        @endif
                @endif
            @endauth
    </div>
@empty
    @endforelse
</div>
{{--  --}}


</div>
