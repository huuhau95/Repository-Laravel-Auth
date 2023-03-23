<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($attributes)
    {
        return $this->userRepository->create($attributes);
    }

    public function update($id, $attributes)
    {
        return $this->userRepository->update($id, $attributes);
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }
}
