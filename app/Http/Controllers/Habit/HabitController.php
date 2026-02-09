<?php

namespace App\Http\Controllers\Habit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Habit\StoreHabitRequest;
use App\Models\Habit;
use App\Models\HabitCheckIn;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function create()
    {
        $this->authorize('create', Habit::class);
        return view('pages.habits.create');
    }

    public function store(StoreHabitRequest $request)
    {
        $this->authorize(Habit::class);

        Habit::create([
            ...$request->validatedAttributes(),
            'user_id' => auth()->id()
        ]);

        return redirect()->route('dashboard');
    }
}
