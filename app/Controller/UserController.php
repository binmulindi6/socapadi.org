<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\User;

// save mail in DB
class UserController extends Controller
{

    public static function index()
    {
        $items = new User();
        return $items->latest();
    }
    public static function show($request)
    {
        // return [1];
        $item = new User();
        $data = $item->find($request['id']);
        if ($data) {
            return $data->getInfo();
        } else {
            return false;
        }
    }

    public static function update()
    {
        $params = Request::params();
        $instance = new User();
        $self = $instance->find($params['user_id']);

        if ($self) {

            if (Request::validate([
                'first_name',
                'username',
                'email',
                'telephone',
                // 'password',
                // 'event_id',
            ])) {
                // $mail = new Mail();
                if ($self->username !== $params['username']) {
                    if ($instance->checkUsername($params["username"])) {
                        http_response_code(400);
                        return "Username already exists";
                    }
                }
                if ($self->email !== $params['email']) {
                    if ($instance->checkEmail($params["email"])) {
                        http_response_code(400);
                        return "Email already taken";
                    }
                }
                if ($self->telephone !== $params['telephone']) {
                    if ($instance->checkPhone($params["telephone"])) {
                        http_response_code(400);
                        return "Phone Number already taken";
                    }
                }
                $user = $self->save(
                    [
                        'names' => $params["names"],
                        'username' => $params["username"],
                        'email' => $params["email"],
                        'telephone' => $params["telephone"],
                    ]
                );

                return "success";
            } else {
                // return "oklm";
                http_response_code(400);
                return "please check params ";
            }
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }

    public static function changStatus()
    {
        if (Request::validate(['user_id'])) {
            $params = Request::params();
            $instance = new User();
            $user = $instance->find($params['user_id']);
            $user->changeStatus();
            return "success";
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function makeAdmin()
    {
        if (Request::validate(['user_id'])) {
            $params = Request::params();
            $instance = new User();
            $user = $instance->find($params['user_id']);
            $user->makeAdmin();
            return "success";
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function search()
    {
        $items = new User();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new User();
        $item->delete();
        return "succes";
    }
}