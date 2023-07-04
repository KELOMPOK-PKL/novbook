<div class="w-full my-1">
    <x-form.label for="title" :value="__('Title')" class="font-semibold text-lg" />
    <x-form.input type="text" placeholder="Enter Title" :value="old('title', $chapter ?? null)" name="title" id="title" class="w-full"
        :disabled="request()->routeIs('dashboard.chapter.show')" />
    <div class="mt-2">
        @error('title')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</div>
<x-form.label class="font-semibold text-lg " value="Novel Title" for="novel_id" />
<x-form.select name="novel_id" id="novel_id" :disabled="request()->routeIs('dashboard.chapter.show')">
    <option disabled hidden {{ old('Novel') != null ?: 'selected' }}>
        {{ __('Select Novel') }}
    </option>
    @foreach ($novels as $novel)
        <option value="{{ $novel->id }}" @selected(!empty($chapter) && $novel->id == $chapter->novel_id)>
            {{ $novel->title }}
        </option>
    @endforeach
    <div class="mt-2">
        @error('novel_id')
            <x-form.error :messages="$message" />
        @enderror
    </div>
</x-form.select>
@error('novel_id')
    <x-form.error messages="{{ $message }}" />
@enderror
@if (!request()->routeIs('dashboard.chapter.create'))
    <div class="mb-3">
        <x-form.label for="pdf" :value="__('Previous pdf')" class="font-semibold text-lg" />
        <iframe src="{{ asset('storage/' . $chapter->pdf) }}" width="100px" alt="...">
    </div>
@endif
@if (!request()->routeIs('dashboard.chapter.show'))
    <div class="w-full my-1">
        <x-form.label for="pdf" :value="__('Pdf')" class="font-semibold text-lg" />
        <x-form.file-input name="pdf" id="pdf" class="w-full" :disabled="request()->routeIs('dashboard.novel.show')" />
        <div class="mt-2">
            @error('pdf')
                <x-form.error :messages="$message" />
            @enderror
        </div>
    </div>
@endif

<div class="flex gap-2 mt-5">
    @if (!request()->routeIs('dashboard.chapter.show'))
        <x-primary-button>
            Save Changes
        </x-primary-button>
    @endif
    <a href="{{ route('dashboard.chapter.index') }}">
        <x-danger-button type="button">
            Back
        </x-danger-button>
    </a>
</div>
