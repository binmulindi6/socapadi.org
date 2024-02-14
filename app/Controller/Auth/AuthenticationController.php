<?php

namespace App\Controller\Auth;

use App\Http\Request;
use App\Model\User;
use App\Controller\Controller;
use App\Model\PersonalToken;

// save mail in DB
class AuthenticationController extends Controller
{

    public static function register()
    {

        if (Request::validate([
            'first_name',
            // 'last_name',
            'username',
            'email',
            'telephone',
            'password',
        ])) {
            $params = Request::params();
            $instance = new User();
            // $mail = new Mail();
            if ($instance->checkUsername($params["username"])) {
                http_response_code(400);
                return "Username already exists";
            }
            if ($instance->checkEmail($params["email"])) {
                http_response_code(400);
                return "Email already taken";
            }
            if ($instance->checkPhone($params["telephone"])) {
                http_response_code(400);
                return "Phone Number already taken";
            }

            // die();
            $user = $instance->create(
                [
                    'first_name' => $params["first_name"],
                    // 'last_name' => $params["last_name"],
                    // 'organiser' => $params["organiser"],
                    'username' => $params["username"],
                    'email' => $params["email"],
                    'telephone' => $params["telephone"],
                    'password' => password_hash($params["password"], PASSWORD_DEFAULT),
                    'created_at' => date('Y-m-d h:i'),
                ]
            );

            // return $created->send();
            // $user = $instance->findByOptions([$params['email']]);
            $token = self::generateToken($user->id);
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
            'username',
            'password',
        ])) {
            $params = Request::params();
            $instance = new User();
            $user = $instance->findByOptions(["username" => $params['username']]) ? $instance->findByOptions(["username" => $params['username']]) : $instance->findByOptions(["email" => $params['username']]);
            if (!is_null($user) && password_verify($params['password'], $user->password)) {

                $token = $user->getLastToken() ? $user->getLastToken()[0]->token : self::generateToken($user->id);
                // return $token
                return
                    [
                        "user" => $user,
                        "token" => $token,
                    ];
            } else {
                // return "oklm";
                http_response_code(400);
                return "username or password incorrect";
            }
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }

    public static function generateToken($user)
    {
        $tok = new PersonalToken();
        $token = $tok->generate($user);
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
