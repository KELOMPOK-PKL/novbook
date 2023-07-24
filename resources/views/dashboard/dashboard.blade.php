<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __("You're logged in!")  }}
    </div>

    <div class="flex">
        
        <div class="flex items-center justify-between font-bold text-lg p-6 mt-5 w-1/3 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 m-2" >
            <i class="fa-solid fa-book text-6xl"></i> 
            <p class="text-center">
                {{ $novelCount }}
            </p>
        </div>
        <div class="flex items-center justify-between font-bold text-lg p-6 mt-5 w-1/3 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 m-2" >
            <i class="fa-solid fa-bars text-6xl"></i> 
            <p class="text-center">
                {{ $categoryCount }}
            </p>
        </div>
        <div class="flex items-center justify-between font-bold text-lg p-6 mt-5 w-1/3 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 m-2" >
            <i class="fa-solid fa-user text-6xl"></i> 
            <p class="text-center">
                {{ $userCount }}
            </p>
        </div>
        <div class="flex items-center justify-between font-bold text-lg p-6 mt-5 w-1/3 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1 m-2" >
            <i class="fa-solid fa-list text-6xl"></i> 
            <p class="text-center">
                {{ $chapterCount }}
            </p>
        </div>
    </div>

</x-app-layout>
