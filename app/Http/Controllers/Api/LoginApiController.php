<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Routing\Controller;

class LoginApiController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $authenticate = $this->authService->authenticate($credentials);

        if ($authenticate === false) {
            return response()->json(['errors' => 'Account not found. Please check your login credentials or register for an account.'], 401);
        }

        return response()->json($authenticate, 200);
    }

    public function logout(Request $request)
    {
        $this->authService->logout();
        return response()->json(['messages' => 'Successfully logged out'], 200);
    }
}
