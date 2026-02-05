<?php

namespace App\Http\Controllers;

use App\Http\Requests\Habit\StoreHabitRequest;
use App\Models\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function create()
    {
        return view('pages.habits.create');
    }

    public function store(StoreHabitRequest $request)
    {

        $validatedAttributes = $request->validated();
        $validatedAttributes['user_id'] = auth()->user()->id;

        Habit::create($validatedAttributes);

        return redirect()->route('dashboard');
    }
}
