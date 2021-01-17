<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class AuthControoler extends Controller
{

    /**
     * AuthControoler constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('login', 'register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->all());

        return [
            'message' => 'successfully registered',
            'user' => $user
        ];
    }


    public function login(LoginRequest $request)
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException('Invalid email or password');
        }

        return [
            'message' => 'Successfully logged in',
            'token' => auth()->user()->createToken('user-token-' . auth()->id())->plainTextToken,
            'user' => auth()->user()
        ];
    }


    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return [
            'message' => 'logout successfully'
        ];
    }


    public function me()
    {
        return [
            'data' => auth()->user()
        ];
    }
}
