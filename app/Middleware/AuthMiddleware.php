<?php

namespace App\Middleware;

use App\Model\PersonalToken;

class AuthMiddleware
{
    public static function check()
    {
        $token = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : null;

        $passport  = new PersonalToken();
        return $passport->check($token);
    }
}
