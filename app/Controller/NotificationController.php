<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Notification;

// save mail in DB
class NotificationController extends Controller
{

    public static function index()
    {
        $items = new Notification();
        return $items->all();
    }
    public static function show($request)
    {
        // return [1];
        $item = new Notification();
        return $item->find($request['id']);
    }

    public static function store()
    {
        if (Request::validate([
            'text',
            'user_id',
        ])) {
            $params = Request::params();
            $instance = new Notification();
            // $mail = new Mail();
            $item =  $instance->create(
                [
                    'text' => $params["text"],
                    'user_id' => $params["user_id"],
                ]
            );

            // return $created->send();
            return "success";
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function search()
    {
        $items = new Notification();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new Notification();
        $item->delete();
        return "succes";
    }
}
