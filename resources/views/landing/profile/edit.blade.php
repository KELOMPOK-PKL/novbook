<x-landing-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="px-10 ">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="w-full">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="mt-8 p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="w-full">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="mt-8 mb-8 p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="w-full">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-landing-layout>
