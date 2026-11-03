<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskCompletion;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    private function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:2000', 'regex:/^https?:\/\/\S+$/i'],
            'points' => ['required', 'integer', 'min:1', 'max:1000000'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $tasks = Task::query()
            ->when(! $user->isAdmin(), fn ($q) => $q->where('is_active', true))
            ->latest('id')->get();

        $done = TaskCompletion::where('user_id', $user->id)->pluck('task_id')->all();

        return view('tasks.index', compact('tasks', 'done'));
    }

    public function claim(Request $request, Task $task)
    {
        abort_unless($task->is_active, 404);
        $user = $request->user();

        try {
            DB::transaction(function () use ($task, $user) {
                TaskCompletion::create(['user_id' => $user->id, 'task_id' => $task->id, 'points' => $task->points]);
                $user->credit($task->points, 'task', 'Task completed: '.$task->title, 'task:'.$task->id);
            });
        } catch (UniqueConstraintViolationException $e) {
            return back()->withErrors(['task' => 'You have already completed this task.']);
        }

        return back()->with('success', '+'.number_format($task->points).' points earned!');
    }

    public function create()
    {
        return view('tasks.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['is_active'] = $request->boolean('is_active');
        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task created.');
    }

    public function edit(Task $task)
    {
        return view('tasks.form', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate($this->rules());
        $data['is_active'] = $request->boolean('is_active');
        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }
}
