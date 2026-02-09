<?php

namespace App\Http\Controllers\Task;

use App\Enums\TaskStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class TaskController extends Controller
{
    public function create()
    {
        $this->authorize('create', Task::class);

        return view('pages.tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $this->authorize('create', Task::class);

        Task::create([
            ...$request->validatedAttributes(),
            'user_id' => auth()->id(),
            'status' => TaskStatus::ACTIVE
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(Task $task)
    {
        return view('pages.tasks.edit', ['task' => $task]);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        $task->update($request->validatedAttributes());

        return redirect()->route('dashboard');
    }

    public function markComplete(Task $task)
    {
        $task->status       = TaskStatus::COMPLETED;
        $task->completed_at = now();

        $task->save();

        return redirect()->route('dashboard');
    }
}
