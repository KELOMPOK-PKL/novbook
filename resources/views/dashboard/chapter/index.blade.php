<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Chapters') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-x-auto">

                    <a href="{{ route('dashboard.chapter.create') }}">
                        <x-primary-button class="mb-5">
                            Add Chapter
                        </x-primary-button>
                    </a>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Novel Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @forelse ($chapters as $chapter)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <td class="px-6 py-4">{{ $no++ }}</td>
                                        <td class="px-6 py-4">{{ $chapter->title }}</td>
                                        <td class="px-6 py-4">{{ $chapter->novel->title }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <form action="{{ route('dashboard.chapter.destroy', $chapter->id) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?')">
                                                <x-button variant="warning"
                                                    href="{{ route('dashboard.chapter.edit', $chapter->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </x-button>
                                                <x-button variant="info"
                                                    href="{{ route('dashboard.chapter.show', $chapter->id) }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </x-button>
                                                @csrf
                                                @method('DELETE')
                                                <x-button type="submit" variant="danger">
                                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                                </x-button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center">No data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
