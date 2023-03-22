<?php

namespace App\Repositories;

interface AuthRepository
{
    public function authenticate($credentials);

    public function logout();
}
