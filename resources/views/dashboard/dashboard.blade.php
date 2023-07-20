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
        <div class="p-6 mt-5 w-1/3 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1" >

        </div>
        <div class="p-6 mt-5 w-1/3 ml-10     overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1" >

        </div>
    </div>

</x-app-layout>
