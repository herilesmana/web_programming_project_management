<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks for ') }} {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="bg-green-500 text-white p-4 mb-4 rounded">
                    {{ $message }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('projects.tasks.create', $project->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Task</a>
                    <table class="min-w-full bg-white border mt-4">
                        <thead class="bg-gray-200 text-gray-600">
                            <tr>
                                <th class="py-2 px-4 border">Name</th>
                                <th class="py-2 px-4 border">Due Date</th>
                                <th class="py-2 px-4 border">Status</th>
                                <th class="py-2 px-4 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr class="text-gray-700">
                                <td class="py-2 px-4 border">{{ $task->title }}</td>
                                <td class="py-2 px-4 border">{{ $task->due_date }}</td>
                                <td class="py-2 px-4 border">{{ $task->status }}</td>
                                <td class="py-2 px-4 border flex space-x-2">
                                    <a href="{{ route('projects.tasks.show', [$project->id, $task->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">View</a>
                                    <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                    <form action="{{ route('projects.tasks.destroy', [$project->id, $task->id]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
