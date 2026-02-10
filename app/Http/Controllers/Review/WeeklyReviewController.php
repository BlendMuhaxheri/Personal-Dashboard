<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Habit;
use App\Models\Task;
use App\Services\WeeklyReview\WeeklyReviewData;
use Illuminate\Http\Request;

use function Illuminate\Support\now;

class WeeklyReviewController extends Controller
{
    public function show()
    {
        $data = WeeklyReviewData::for(auth()->user());

        return view('review.weekly', $data);
    }
}
