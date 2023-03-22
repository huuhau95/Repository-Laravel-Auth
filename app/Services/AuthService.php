<?php

namespace App\Services;

use App\Repositories\AuthRepository;

class AuthService
{
    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function authenticate($credentials)
    {
        return $this->authRepository->authenticate($credentials);
    }

    public function logout()
    {
        return $this->authRepository->logout();
    }
}
