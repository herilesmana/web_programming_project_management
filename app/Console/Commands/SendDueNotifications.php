<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Notifications\TaskDueNotification;
use App\Notifications\ProjectDueNotification;
use Carbon\Carbon;

class SendDueNotifications extends Command
{
    protected $signature = 'notifications:send-due';

    protected $description = 'Send notifications for tasks and projects that are due soon';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all();
        $dueDate = Carbon::now()->addDays(3);

        $tasks = Task::where('due_date', '<=', $dueDate)
            ->where('status', '!=', 'Completed')
            ->get();

        $projects = Project::where('end_date', '<=', $dueDate)->get();

        foreach ($users as $user) {
            foreach ($tasks as $task) {
                $user->notify(new TaskDueNotification($task));
            }
            foreach ($projects as $project) {
                $user->notify(new ProjectDueNotification($project));
            }
        }

        $this->info('Due notifications have been sent successfully.');
    }
}
