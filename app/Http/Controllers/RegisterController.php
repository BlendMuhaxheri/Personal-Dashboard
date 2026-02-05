<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {

        return view('pages.auth.register');
    }

    public function store(RegisterUserRequest $request)
    {

        $validated = $request->validated();

        $user = User::create($validated);

        Auth::login($user);

        return redirect('');
    }
}
