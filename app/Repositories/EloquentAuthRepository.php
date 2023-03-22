<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class EloquentAuthRepository implements AuthRepository
{
    public function authenticate($credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;

            return [
                'user' => $user,
                'token' => $token,
            ];
        }

        return false;
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
    }
}
