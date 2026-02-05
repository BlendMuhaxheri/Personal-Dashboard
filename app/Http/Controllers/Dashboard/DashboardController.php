<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Http\Controllers\Controller;
use App\Models\HabitCheckIn;
use App\Services\Dashboard\DashboardData;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'dashboard',
            DashboardData::for(auth()->user())
        );
    }
}
