<?php

namespace App\Http\Controllers\Api\Account\Authenticate;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\Response;
use App\Transformers\User\UserTransformer;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\Account\User\UserStoreRequest;

class AuthenticateApiController extends ApiController
{
    protected $authService;
    protected $userService;

    public function __construct(AuthService $authService, UserService $userService)
    {
        $this->authService = $authService;
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $authenticate = $this->authService->authenticate($credentials);

        if ($authenticate === false) {
            return response()->json(['errors' => 'Account not found. Please check your login credentials or register for an account.'], 401);
        }

        return $this->respond($authenticate,  Response::HTTP_OK, 'User login success');
    }

    public function register(UserStoreRequest $request)
    {
        $credentials = $request->only('name', 'email', 'password');
        $user = $this->userService->create($credentials);

        $user = fractal($user->refresh(), new UserTransformer())->toArray();

        return $this->respond($user,  Response::HTTP_OK, 'User create success');
    }

    public function logout(Request $request)
    {
        $this->authService->logout();
        return response()->json(['messages' => 'Successfully logged out'], 200);
    }
}
