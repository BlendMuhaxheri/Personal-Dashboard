<?php

namespace App\Http\Controllers\HabitCheckin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HabitCheckin\StoreHabitCheckin;
use App\Http\Requests\HabitCheckin\StoreHabitCheckinRequest;
use App\Models\Habit;
use App\Models\HabitCheckIn;
use Illuminate\Http\Request;

class HabitCheckinController extends Controller
{
    public function store(StoreHabitCheckinRequest $request, Habit $habit)
    {
        $validatedAttributes = $request->validated();

        HabitCheckIn::create([
            ...$validatedAttributes,
            'user_id'  => auth()->id(),
            'habit_id' => $habit->id
        ]);


        return redirect()->route('dashboard');
    }
}
