<?php

namespace App\Middleware;

use App\Model\PersonalToken;

class AbilityMiddleware
{
    public static function check($abilities)
    {
        $token = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : null;

        $passport  = new PersonalToken();

        return $passport->check($token, $abilities) ? true :  self::unAuth();
    }

    public static function unAuth()
    {
        http_response_code(403);
        return false;
    }
}
