<?php

namespace App\Http;

use App\Model\User;
use App\Config\Config;
use App\Model\PersonalToken;
use App\Middleware\AuthMiddleware;
use App\Controller\Auth\AuthenticationController;

class Session
{
    public static function check(): bool
    {
        if (isset($_SESSION)) {
            if (isset($_SESSION['user'])) {
                // $passport  = new PersonalToken();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function user(): User
    {
        if (isset($_SESSION)) {
            if (isset($_SESSION['user'])) {

                return $_SESSION['user'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function logout()
    {
        session_destroy();
        unset($_SESSION);
        return 'success';
    }
}
