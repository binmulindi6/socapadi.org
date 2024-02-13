<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\EventUser;
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
        return $item->find($request['id']);
    }

    public static function createManager()
    {
        $params = Request::params();
        $instance = new User();
        if (Request::validate([
            'first_name',
            // 'last_name',
            'username',
            'email',
            'telephone',
            'password',
            'event_id',
        ])) {
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
            // $mail = new Mail();
            $user = $instance->create(
                [
                    'first_name' => $params["first_name"],
                    // 'last_name' => $params["last_name"],
                    // 'organiser' => $params["organiser"],
                    'username' => $params["username"],
                    'email' => $params["email"],
                    'telephone' => $params["telephone"],
                    // 'is_manager' => 1,
                    // 'event_id' => $params["event_id"],
                    'password' => password_hash($params["password"], PASSWORD_DEFAULT),
                    'created_at' => date('Y-m-d h:i'),
                ]
            );

            // return $created->send();
            $eventUserInstance =  new EventUser();
            $user && $eventUserInstance->create(
                [
                    'user_id' => $user->id,
                    'event_id' => $params["event_id"],
                    'role' => "manager",
                ]
            );
            return "success";
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function addOperator()
    {
        $params = Request::params();
        $instance = new User();
        if (Request::validate([
            'first_name',
            // 'last_name',
            'username',
            'email',
            'telephone',
            'password',
            'event_id',
        ])) {
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
            $user = $instance->create(
                [
                    'first_name' => $params["first_name"],
                    // 'last_name' => $params["last_name"],
                    // 'organiser' => $params["organiser"],
                    'username' => $params["username"],
                    'email' => $params["email"],
                    'telephone' => $params["telephone"],
                    // 'is_operator' => 1,
                    // 'event_id' => $params["event_id"],
                    'password' => password_hash($params["password"], PASSWORD_DEFAULT),
                    'created_at' => date('Y-m-d h:i'),
                ]
            );


            $eventUserInstance =  new EventUser();
            $user && $eventUserInstance->create(
                [
                    'user_id' => $user->id,
                    'event_id' => $params["event_id"],
                    'role' => "operator",
                ]
            );
            return "success";
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
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
                        'first_name' => $params["first_name"],
                        // 'last_name' => $params["last_name"],
                        // 'organiser' => $params["organiser"],
                        'username' => $params["username"],
                        'email' => $params["email"],
                        'telephone' => $params["telephone"],
                        // 'is_operator' => 1,
                        // 'event_id' => $params["event_id"],
                        // 'password' => password_hash($params["password"], PASSWORD_DEFAULT),
                        'created_at' => date('Y-m-d h:i'),
                    ]
                );


                $eventUserInstance =  new EventUser();
                if ($user && $params['event_id']) {
                    $role = $eventUserInstance->findByOptions(
                        [
                            'user_id' => $self->id,
                            'event_id' => $params["event_id"],
                        ]
                    );
                    $role && $role->save(
                        [
                            'role' => $params['role']
                        ]
                    );
                }
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
    public static function getReservations($params)
    {
        $instance = new User();
        $user = $instance->find($params['id']);
        return $user->reservations();
    }
    public static function getPayments($params)
    {
        $instance = new User();
        $user = $instance->find($params['id']);
        return $user->payments();
    }
    public static function getNotifications($params)
    {
        $instance = new User();
        $user = $instance->find($params['id']);
        return $user->notifications();
    }
    public static function getTickets($params)
    {
        $instance = new User();
        $user = $instance->find($params['id']);
        return $user->tickets();
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
