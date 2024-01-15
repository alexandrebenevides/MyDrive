<?php

namespace App\Services\Contracts;

interface AuthServiceInterface 
{
    public function authUser(array $credentials);
}