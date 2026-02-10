<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Services\WeeklyReview\WeeklyReviewData;


class WeeklyReviewController extends Controller
{
    public function show()
    {
        $data = WeeklyReviewData::for(auth()->user());

        return view('review.weekly', $data);
    }
}
