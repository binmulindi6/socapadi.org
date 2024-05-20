<?php

namespace App\Controller\Auth;

use App\Model\Mail;
use App\Model\User;
use App\Http\Request;
use App\Http\Session;
use App\Model\PersonalToken;
use App\Controller\Controller;
use App\Controller\WebsiteController;

// save mail in DB
class AuthenticationController extends Controller
{

    public static function register()
    {

        if (Request::validate([
            'names',
            'email',
            'telephone',
            'password',
        ])) {
            $params = Request::params();
            $instance = new User();
            // // $mail = new Mail();
            // if ($instance->checkemail($params["email"])) {
            //     http_response_code(400);
            //     return "email already exists";
            // }
            if ($instance->checkEmail($params["email"])) {
                http_response_code(400);
                return "Email already taken";
            }
            if ($instance->checkPhone($params["telephone"])) {
                http_response_code(400);
                return "Phone Number already taken";
            }

            // die();
            $verify_code = mt_rand(11111, 99999);
            $user = $instance->create(
                [
                    'names' => $params["names"],
                    'email_verification_code' => $verify_code,
                    'email' => $params["email"],
                    'telephone' => $params["telephone"],
                    'password' => password_hash($params["password"], PASSWORD_DEFAULT),
                ]
            );

            // return $created->send();
            // $user = $instance->findByOptions([$params['email']]);
            $token = self::generateToken($user);
            return [
                "user" => $user,
                "token" => $token,
            ];
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function login()
    {
        // password_verify($userEnteredPassword, $storedHashedPassword)
        // var_dump($_SERVER['HTTP_AUTHORIZATION']);
        if (Request::validate([
            'email',
            'password',
        ])) {
            $params = Request::params();
            $instance = new User();
            $user = $instance->findByOptions(["email" => $params['email']]) ? $instance->findByOptions(["email" => $params['email']]) : $instance->findByOptions(["email" => $params['email']]);
            if (!is_null($user) && password_verify($params['password'], $user->password)) {

                $token = ($user->getLastToken()  && $user->getLastToken()[0]) ?  $user->getLastToken()[0]->token : self::generateToken($user);
                // return $token
                return
                    [
                        "user" => $user,
                        "token" => $token,
                    ];
            } else {
                // return "oklm";
                http_response_code(400);
                return "email or password incorrect";
            }
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function loginWeb()
    {
        // password_verify($userEnteredPassword, $storedHashedPassword)
        // var_dump($_SERVER['HTTP_AUTHORIZATION']);
        if (Request::validate([
            'email',
            'password',
        ])) {
            $params = Request::params();
            $instance = new User();
            $user = $instance->findByOptions(["email" => $params['email']]) ? $instance->findByOptions(["email" => $params['email']]) : $instance->findByOptions(["email" => $params['email']]);
            if (!is_null($user) && password_verify($params['password'], $user->password)) {
                $_SESSION["user"] = $user;
                return Request::redirect('/dashboard');
            } else {
                // return "oklm";
                session_unset();
                http_response_code(400);
                echo "
                <script>
                    alert('passowrd incorect');
                    window.history.back();
                </script>
                ";
            }
        } else {
            // echo 1113;
            // return "oklm";
            http_response_code(400);
            echo "Unautorised";
        }
    }



    public static function logout()
    {
        return Session::logout();
        // return 'sucess';
    }
    public static function logoutWeb()
    {
        Session::logout();
        return Request::redirect('/dashboard');
        // return 'sucess';
    }

    public static function generateToken($user)
    {
        $tok = new PersonalToken();
        $ability = $user->isAdmin() ? 'admin' : 'simple';
        $token = $tok->generate($user->id, $ability);
        return $token->token;
    }
    public static function user()
    {
        $token = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : null;
        $passport  = new PersonalToken();
        // $passport->check()
        return $passport->findByOptions(['token' => $token]) ? $passport->findByOptions(['token' => $token])->user() : false;
    }
}
