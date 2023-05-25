<div class="w-full my-1">
    <x-form.label for="title" :value="__('Title')" class="font-semibold text-lg" />
    <x-form.input type="text" placeholder="Enter Title" :value="old('title', $novelCategory ?? null)" name="title" id="title" class="w-full"
        :disabled="request()->routeIs('dashboard.novel-category.show')" />
    <div class="mt-2">
        @error('title')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</div>
<div class="w-full my-1">
    <x-form.label for="description" :value="__('Description')" class="font-semibold text-lg" />
    <x-form.textarea name="description" id="description" placeholder="Enter Description" class="w-full"
        :disabled="request()->routeIs('dashboard.novel-category.show')">
        @if (!request()->routeIs('dashboard.novel-category.create'))
            {{ $novelCategory->description }}
        @endif
    </x-form.textarea>
    <div class="mt-2">
        @error('descripiton')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</div>

<div class="flex gap-2 mt-5">
    @if (!request()->routeIs('dashboard.novel-category.show'))
        <x-primary-button>
            Save Changes
        </x-primary-button>
    @endif
    <a href="{{ route('dashboard.novel-category.index') }}">
        <x-danger-button type="button">
            Back
        </x-danger-button>
    </a>
</div>
