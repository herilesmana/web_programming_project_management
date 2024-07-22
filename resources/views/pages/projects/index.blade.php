<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="bg-green-500 text-white p-4 mb-4 rounded">
                    {{ $message }}
                </div>
            @endif
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Project</a>

                    <form method="GET" action="{{ route('projects.index') }}" class="mb-4 mt-4">
                        <div class="flex space-x-4">
                            <input type="text" name="search" placeholder="Search by name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ request('search') }}">
                            <input type="date" name="start_date" placeholder="Start date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ request('start_date') }}">
                            <input type="date" name="end_date" placeholder="End date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ request('end_date') }}">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-0 px-4 rounded">Search</button>
                        </div>
                    </form>

                    <table class="min-w-full bg-white border mt-4">
                        <thead class="bg-yellow-300 bg-opacity-40 text-black">
                            <tr>
                                <th class="py-2 px-4 border">Name</th>
                                <th class="py-2 px-4 border">Start Date</th>
                                <th class="py-2 px-4 border">End Date</th>
                                <th class="py-2 px-4 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr class="text-gray-700">
                                <td class="py-2 px-4 border">{{ $project->name }}</td>
                                <td class="py-2 px-4 border">{{ $project->start_date }}</td>
                                <td class="py-2 px-4 border">{{ $project->end_date }}</td>
                                <td class="py-2 px-4 border flex space-x-2">
                                    <a href="{{ route('projects.show', $project->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">View</a>
                                    <a href="{{ route('projects.tasks.index', $project->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Tasks</a>
                                    <a href="{{ route('projects.edit', $project->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
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
