<div class="w-full my-1">
    <x-form.label for="writer" :value="__('Writer')" class="font-semibold text-lg" />
    <x-form.input type="text" :value="old('writer', $novel ?? null)" name="writer" id="writer" class="w-full" :disabled="request()->routeIs('dashboard.novel.show')"
        placeholder="Enter Writer" />
    <div class="mt-2">
        @error('writer')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</div>
<div class="w-full my-1">
    <x-form.label for="title" :value="__('Title')" class="font-semibold text-lg" />
    <x-form.input type="text" :value="old('title', $novel ?? null)" name="title" id="title" class="w-full" :disabled="request()->routeIs('dashboard.novel.show')"
        placeholder="Enter Title" />
    <div class="mt-2">
        @error('title')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</div>

<div class="w-full my-1">
    <x-form.label for="description" :value="__('Description')" class="font-semibold text-lg" />
    <x-form.textarea name="description" id="description" class="w-full" :disabled="request()->routeIs('dashboard.novel.show')"
        placeholder="Enter Description">
        @if (!request()->routeIs('dashboard.novel.create'))
            {{ $novel->description }}
        @endif
    </x-form.textarea>
    <div class="mt-2">
        @error('description')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</div>
<x-form.label class="font-semibold text-lg " value="Category" for="novel_category_id" />
<x-form.select name="novel_category_id" id="novel_category_id" :disabled="request()->routeIs('dashboard.novel.show')">
    <option disabled hidden {{ old('Category') != null ?: 'selected' }}>
        {{ __('Select Category') }}
    </option>
    @foreach ($novelCategory as $cateogry)
        <option value="{{ $cateogry->id }}" @selected(!empty($novel) && $cateogry->id == $novel->novel_category_id)>
            {{ $cateogry->title }}
        </option>
    @endforeach
    <div class="mt-2">
        @error('novel_category_id')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</x-form.select>
@error('novel_category_id')
    <x-form.error messages="{{ $message }}" />
@enderror
<div class="w-full my-1">
    <x-form.label for="publish_date" :value="__('Publish Date')" class="font-semibold text-lg" />
    <x-form.input type="date" :value="old('publish_date', $novel ?? null)" name="publish_date" id="publish_date" class="w-full"
        :disabled="request()->routeIs('dashboard.novel.show')" />
    <div class="mt-2">
        @error('publish_date')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</div>
@if (!request()->routeIs('dashboard.novel.create'))
    <div class="w-full my-1">
        @if (request()->routeIs('dashboard.novel.show'))
            <x-form.label for="image" :value="__('Image')" class="font-semibold text-lg" />
        @else
            <x-form.label for="image" :value="__('The previous Image')" class="font-semibold text-lg" />
        @endif
        <img src="{{ asset('storage/' . $novel->image) }}" class="w-1/4" alt="">
    </div>
@endif
@if (!request()->routeIs('dashboard.novel.show'))
    <div class="w-full my-1">
        <x-form.label for="image" :value="__('Image')" class="font-semibold text-lg" />
        <x-form.file-input name="image" id="image" class="w-full" :disabled="request()->routeIs('dashboard.novel.show')" />
        <div class="mt-2">
            @error('image')
                <x-form.error :messages="$message" />
            @enderror
        </div>
    </div>
@endif
<div class="flex gap-2 mt-5">
    @if (!request()->routeIs('dashboard.novel.show'))
        <x-primary-button>
            Save Changes
        </x-primary-button>
    @endif
    <a href="{{ route('dashboard.novel.index') }}">
        <x-danger-button type="button">
            Back
        </x-danger-button>
    </a>
</div>
