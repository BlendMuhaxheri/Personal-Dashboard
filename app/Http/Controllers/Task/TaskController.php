<?php

namespace App\Http\Controllers\Task;

use App\Enums\TaskStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

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

    public function edit() {}
}
