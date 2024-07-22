<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Task to ') }} {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('projects.tasks.store', $project->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Task Name</label>
                            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="title" name="title" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="due_date" class="block text-gray-700">Due Date</label>
                            <input type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="due_date" name="due_date" required>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700">Status</label>
                            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="status" name="status" required>
                                <option value="Not Started">Not Started</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
