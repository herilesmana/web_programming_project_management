<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Project Name</label>
                            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="name" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="start_date" class="block text-gray-700">Start Date</label>
                            <input type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-gray-700">End Date</label>
                            <input type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="end_date" name="end_date" required>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
