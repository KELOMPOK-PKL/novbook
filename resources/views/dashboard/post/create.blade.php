<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           {{ __('Add Product') }}
       </h2>
    </x-slot>

    <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                   <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <div class="my-3" >
                       <x-input-label for="name" :value="__('Name')" />
                       <x-text-input id="name" placeholder="Masukkan_Name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"/>
                       @error('name')
                           <div class="alert alert-danger mt-2">{{ $message }}</div>
                       @enderror
                   </div>
                   <div class="my-3" >
                       <x-input-label for="title" :value="__('Title')" />
                       <textarea id="title" rows="4" type="text" name="title" :value="old('title')" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan diskripsi"></textarea>
                       @error('title')
                       <div class="alert alert-danger mt-2">{{ $message }}</div>
                       @enderror
                   </div>
                   <div class="my-3" >
                       <x-input-label for="image" :value="__('Image')" />
                       <input type="file" name="image" id="image" :value="old('image')" class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="large_size" type="file">
                       @error('image')
                           <div class="alert alert-danger mt-2">{{ $message }}</div>
                       @enderror
                   </div>
                   <div class="my-3" >
                    <x-input-label for="pdf" :value="__('Pdf')" />
                    <input type="file" name="pdf" id="pdf" :value="old('pdf')" class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="large_size" type="file">
                    @error('pdf')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                   <div class="my-2">
                       <x-primary-button class="mb-5 inline-flex items-center px-4 py-2 bg-green-400 dark:bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-500 focus:bg-green-700 dark:focus:bg-green-500 active:bg-green-700 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                          Create
                       </x-primary-button>
                   </div>
                   </form>
               </div>
           </div>
       </div>
    </div>
</x-app-layout>
