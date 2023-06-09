<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('landing.verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('landing.profile.update') }}" enctype="multipart/form-data"
        class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="space-y-2 flex mt-5">
            <div class="relative">
                <div class="z-10">
                    <img @if (!empty(auth()->user()->avatar)) src="{{ asset('storage/' . auth()->user()->avatar) }}"
                    @else
                    src="{{ asset('https://sauvegardewzc.be/wp-content/uploads/2019/03/default-avatar-768x768.png') }}" @endif
                        alt="Avatar" class="w-[128px] h-[128px] rounded-full" alt="" srcset="">
                </div>
                <div class=" bottom-0 left-2 absolute">
                    <label class="cursor-pointer">
                        <p
                            class="ml-20 bg-gray-300 text-gray-500 text-xl text-center text w-10 h-15 rounded-full justify-center items-center ">
                            <i class="fa-solid fa-image"></i>
                        </p>
                        <input id="avatar" name="avatar" type="file" autocomplete="name" class="hidden"
                            :multiple="multiple" :accept="accept" />
                    </label>
                </div>
            </div>

            <x-form.error :messages="$errors->get('avatar')" />
        </div>

        <div class="space-y-2">
            <x-form.label for="name" :value="__('Name')" />

            <x-form.input id="name" name="name" type="text" class="block w-full" :value="old('name', $user->name)" required
                autofocus autocomplete="name" />

            <x-form.error :messages="$errors->get('name')" />
        </div>

        <div class="space-y-2">
            <x-form.label for="email" :value="__('Email')" />

            <x-form.input id="email" name="email" type="email" class="block w-full" :value="old('email', $user->email)" required
                autocomplete="email" />

            <x-form.error :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-300">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500  dark:text-gray-400 dark:hover:text-gray-200 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-button>
                {{ __('Save') }}
            </x-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
