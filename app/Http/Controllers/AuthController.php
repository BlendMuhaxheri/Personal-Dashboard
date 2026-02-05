<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthenticateUserRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {

        return view('pages.auth.login');
    }

    public function store(AuthenticateUserRequest $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are wrong!'
            ]);
        }

        return redirect()->route('dashboard');
    }
}
