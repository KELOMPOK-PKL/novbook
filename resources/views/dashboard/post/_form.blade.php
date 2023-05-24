<div class="my-3">
    <x-input-label for="name" :value="__('Name')" />
    <x-form.input id="name" placeholder="Input Nama Penulis" class="block mt-1 w-full" type="text" name="name"
        :value="old('name', $post ?? null)" :disabled="request()->routeIs('dashboard.post.show')" />
    @error('name')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>
<div class="my-3">
    <x-input-label for="title" :value="__('Title')" />
    <x-form.input id="title" placeholder="Input Title" class="block mt-1 w-full" type="text" name="title"
        :value="old('title', $post ?? null)" :disabled="request()->routeIs('dashboard.post.show')" />
    @error('title')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>
@if (!request()->routeIs('dashboard.post.create'))
    <div class="mb-3">
        <x-input-label for="image" :value="__('Previous Image')" />
        <br>
        <img src="{{ asset('storage/' . $post->image) }}" width="100px" class="img-fluid" alt="...">
    </div>

    <div class="mb-3">
        <x-input-label for="Pdf" :value="__('Previous pdf')" />
        <br>
        <embed src="{{ asset('storage/' . $post->Pdf) }}" width="100px" alt="...">
    </div>
@endif

<div class="my-3">
    <x-input-label for="image" :value="__('Image')" />
    <x-form.file-input type="file" name="image" id="image" id="small_size" type="file" />
    @error('image')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="my-3">
    <x-input-label for="pdf" :value="__('pdf')" />
    <x-form.file-input type="file" name="pdf" id="pdf" id="small_size" type="file" />
    @error('pdf')
        <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
</div>

<div class="my-2">
    <x-primary-button
        class="mb-5 inline-flex items-center px-4 py-2 bg-green-400 dark:bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-500 focus:bg-green-700 dark:focus:bg-green-500 active:bg-green-700 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
        Save Changes
    </x-primary-button>
</div>
