<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="mt-4">
                        <h3 class="font-semibold text-lg text-gray-800 leading-tight">
                            {{ __('Notifications') }}
                        </h3>
                        {{-- If there is no notification, it means there is no task or project due. --}}
                        @if(auth()->user()->notifications->isEmpty())
                            <p class="text-gray-600">No notifications.</p>
                        @endif
                        <ul class="list-disc pl-5">
                            @foreach (auth()->user()->notifications as $notification)
                                <li>
                                    @if($notification->type === 'App\Notifications\TaskDueNotification')
                                        Task "{{ $notification->data['task_name'] }}" is due on {{ $notification->data['due_date'] }}.
                                    @elseif($notification->type === 'App\Notifications\ProjectDueNotification')
                                        Project "{{ $notification->data['project_name'] }}" is due on {{ $notification->data['due_date'] }}.
                                    @endif
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
