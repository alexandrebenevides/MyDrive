<?php

namespace App\Services;

use App\Services\Contracts\AuthServiceInterface;
use Auth;

class AuthService implements AuthServiceInterface
{
    public function authUser(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return true;
        }

        return false;
    }
}