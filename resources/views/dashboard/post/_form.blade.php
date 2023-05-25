@if (!request()->routeIs('dashboard.post.create'))
    <div class="mb-3">
        <x-input-label for="image" :value="__('Previous Image')" />
        <br>
        <img src="{{ asset('storage/' . $post->image) }}" width="100px" class="img-fluid" alt="...">
    </div>
@endif

<div class="my-3">
    <x-input-label for="image" :value="__('Image')" />
    <x-form.file-input type="file" name="image" id="image" id="small_size" type="file" />
    @error('image')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="my-2">
    <x-primary-button class="mb-5 ">
        Save Changes
    </x-primary-button>
</div>
