<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatus;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        return view('pages.tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $validatedAttributes = $request->validated();

        $validatedAttributes['user_id'] = auth()->user()->id;
        $validatedAttributes['status'] = TaskStatus::ACTIVE;

        Task::create($validatedAttributes);

        return redirect()->route('dashboard');
    }

    public function edit() {}
}
