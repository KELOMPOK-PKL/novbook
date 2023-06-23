<div class="w-full bg-white px-10 py-10  shadow-lg rounded-lg">
    @forelse ($ratingItems as $rating)
        <h3 class="font-medium">{{ $rating->user->name }}</h3>
        @for ($i = 1; $i <= 5; $i++)
            <button disabled class="">
                <svg class=" {{ $rating->rating >= $i ? 'text-yellow-400' : 'text-gray-300' }} cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 duration-100 "
                    width="23" height="23" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                    </path>
                </svg>
            </button>
        @endfor
        <p>{{ $rating->comment }}</p>
        @if ($rating->user->id == auth()->user()->id)
            @auth
                <button wire:click="selectEdit({{ $rating->id }})"
                    class="bg-slate-500 px-5 py-2 rounded-lg text-white">Edit</button>
                <button wire:click="delete({{ $rating->id }})"
                    class="bg-red-500 px-5 py-2 rounded-lg text-white">Delete</button>
            @endauth
        @endif

        @if ($rating->user->id == auth()->user()->id && $showFormEdit == true)
            <div class="flex flex-col">
                <div class="flex my-4">
                    @for ($i = 1; $i <= 5; $i++)
                        <button wire:click="setRating({{ $i }})">
                            <svg class=" {{ $i <= $newRating ? 'text-yellow-400' : 'text-gray-300' }} cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 duration-100 "
                                width="23" height="23" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                        </button>
                    @endfor
                </div>
                <form class="w-3/4 ml-8 flex flex-col" wire:submit.prevent="update">
                    <textarea
                        class="py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                    focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                    dark:text-gray-300 dark:focus:ring-offset-dark-eval-1"
                        wire:model.lazy="newComment" id="" cols="80" rows="5"></textarea>
                    <button wire:click="selectEdit({{ $rating->id }})"
                        class="bg-slate-500 px-5 mt-4 py-2 rounded-lg text-white">Simpan</button>
                </form>
            </div>
        @endif
    @empty
        No Data
    @endforelse


</div>
