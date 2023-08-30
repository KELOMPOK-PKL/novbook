<div class="w-full mt-1">
    <x-form.label for="name" :value="__('Name')" class="font-semibold text-lg" />
    <x-form.input type="text" :value="old('name', $user ?? null)" name="name" id="name" class="w-full" :disabled="request()->routeIs('dashboard.user.show')"
        placeholder="Enter Name" />
    <div class="mt-2">
        @error('name')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</div>
<div class="w-full mt-1">
    <x-form.label for="email" :value="__('Email')" class="font-semibold text-lg" />
    <x-form.input type="email" required :value="old('email', $user ?? null)" name="email" id="email" class="w-full"
        :disabled="request()->routeIs('dashboard.user.show')" placeholder="Enter Email" />
    <div class="mt-2">
        @error('email')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</div>
<div class="w-full mt-1">
    <x-form.label for="role" :value="__('Role')" class="font-semibold text-lg" />
    <x-form.select id="role" name="role" :disabled="request()->routeIs('dashboard.user.show')">
        <option disabled hidden {{ old('role') != null ?: 'selected' }}>
            {{ __('Select Role') }}
        </option>
        @foreach ($roles as $role)
            <option value="{{ $role->name }}" class="text-uppercase" @selected(!empty($user) && $role->id == $user->roles->first()->id)>
                {{ $role->name }}
            </option>
        @endforeach
    </x-form.select>
</div>

<div class="w-full mt-1">
    <x-form.label for="password" :value="__('Password')" class="font-semibold text-lg" />
    <x-form.input type="password" :value="old('password', $user ?? null)" name="password" id="password" class="w-full" :disabled="request()->routeIs('dashboard.user.show')"
        placeholder="Enter Password" />
    <div class="mt-2">
        @error('password')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</div>
<div class="flex gap-2 mt-5">
    @if (!request()->routeIs('dashboard.user.show'))
        <x-primary-button>
            Save Changes
        </x-primary-button>
    @endif
    <a href="{{ route('dashboard.user.index') }}">
        <x-danger-button type="button">
            Back
        </x-danger-button>
    </a>
</div>
