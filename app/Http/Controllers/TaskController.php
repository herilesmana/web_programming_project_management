<?php


namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        $tasks = $project->tasks;
        return view('pages.tasks.index', compact('project', 'tasks'));
    }

    public function create(Project $project)
    {
        return view('pages.tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'due_date' => 'required|date',
            'status' => 'required'
        ]);

        $project->tasks()->create($request->all());

        return redirect()->route('projects.tasks.index', $project)->with('success', 'Task created successfully.');
    }

    public function show(Project $project, Task $task)
    {
        return view('pages.tasks.show', compact('project', 'task'));
    }

    public function edit(Project $project, Task $task)
    {
        return view('pages.tasks.edit', compact('project', 'task'));
    }

    public function update(Request $request, Project $project, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'due_date' => 'required|date',
            'status' => 'required'
        ]);

        $task->update($request->all());

        return redirect()->route('projects.tasks.index', $project)->with('success', 'Task updated successfully.');
    }

    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect()->route('projects.tasks.index', $project)->with('success', 'Task deleted successfully.');
    }
}
