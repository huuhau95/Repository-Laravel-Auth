<?php

namespace App\Http\Controllers\Api\Account\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use App\Transformers\User\UserTransformer;
use App\Http\Controllers\Api\ApiController;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Api\Account\User\UserUpdateRequest;

class UserApiController extends ApiController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show(Request $request, User $user)
    {
        $user = fractal($user, new UserTransformer())->toArray();

        return $this->respond($user,  Response::HTTP_OK, 'User show success');
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $userData = $request->only([
            'name',
            'email',
            'password'
        ]);

        $this->userService->update($user->id, $userData);

        $user = fractal($user->refresh(), new UserTransformer())->toArray();

        return $this->respond($user,  Response::HTTP_OK, 'User update success');
    }
}
