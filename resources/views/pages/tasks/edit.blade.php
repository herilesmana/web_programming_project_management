<!-- resources/views/tasks/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('projects.tasks.update', [$project->id, $task->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">Task Name</label>
                            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="title" name="title" value="{{ $task->title }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">Description</label>
                            <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="description" name="description">{{ $task->description }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="due_date" class="block text-gray-700">Due Date</label>
                            <input type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="due_date" name="due_date" value="{{ $task->due_date }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700">Status</label>
                            <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="status" name="status" required>
                                <option value="Not Started" @if($task->status == 'Not Started') selected @endif>Not Started</option>
                                <option value="In Progress" @if($task->status == 'In Progress') selected @endif>In Progress</option>
                                <option value="Completed" @if($task->status == 'Completed') selected @endif>Completed</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
