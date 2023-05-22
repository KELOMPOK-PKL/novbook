<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Post') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">
                    <table class="table-auto sm:w-full sm:whitespace-nowrap">
                        <a href="{{ route('post.create') }}">
                            <x-primary-button class="mb-5 inline-flex items-center px-4 py-2 bg-green-400 dark:bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-500 focus:bg-green-700 dark:focus:bg-green-500 active:bg-green-700 dark:active:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-green-800 transition ease-in-out duration-150">
                                Add Product
                            </x-primary-button>
                        </a>
                        <thead>
                            <tr>
                                <th scope="col" class="border px-4 py-2">Name</th>
                                <th scope="col" class="border px-4 py-2">Title</th>
                                <th scope="col" class="border px-4 py-2">Image</th>
                                <th scope="col" class="border px-4 py-2">Pdf</th>
                                <th scope="col" class="border px-4 py-2">Created_at</th>
                                <th scope="col" class="border px-4 py-2">Option</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($post as $p)
                            <tr>
                                <td class="border px-4 py-2">{{ $p->name }}</td>
                                <td class="border px-4 py-2">{{$p->title}}</td>
                                <td class="border px-4 py-2 flex justify-center items-center">
                                <img src="{{ asset('storage/' . $p->image) }}" class="w-32 m-3">
                                </td>
                                <td class="border px-4 py-2">
                                <embed src="{{ asset('storage/'. $p->pdf) }}">
                                </td>
                                <td class="border px-4 py-2">{{ $p->created_at}}</td>
                                <td class="border px-4 py-2 text-center">
                                    <form action="{{ route('post.destroy', $p->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        <a type="submit" href="{{ route('post.edit', $p->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-300 dark:bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white dark:text-white uppercase tracking-widest hover:bg-yellow-400 dark:hover:bg-yellow-300 focus:bg-yellow-300 dark:focus:bg-yellow-400 active:bg-yellow-300 dark:active:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 dark:focus:ring-offset-yellow-800 transition ease-in-out duration-150">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="ml-3" type="submit">
                                            <i class="fa-sharp fa-solid fa-trash"></i>
                                        </x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border px-4 py-2 text-center">No data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
