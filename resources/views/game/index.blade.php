<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Games') }}
            </h2>
            <a href="{{ route('game.create') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Add New
            </a>
        </div>

    </x-slot>

    <div class="container max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <section class="grid items-start gap-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ __("Name") }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __("Genre") }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __("Developer") }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __("Release Date") }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __("Score") }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ ucfirst($game->name) }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $game->genre->name }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $game->developer }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $game->release_date }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $game->score }}
                                </th>
                                <td class="px-6 py-4 flex justify-end">
                                    <a href="{{ route('game.show', ['game' => $game]) }}"
                                        class="font-medium text-gray-600 dark:text-gray-500 hover:underline float-left mr-4">View</a>
                                    <a href="{{ route('game.edit', ['game' => $game]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline float-left mr-4">Edit</a>
                                    <form action="{{ route('game.destroy', ['game' => $game]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="float-left font-medium text-red-600 dark:text-red-500 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $games->links() }}
        </section>
    </div>

</x-app-layout>
