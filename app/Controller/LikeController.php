<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Like;

// save mail in DB
class LikeController extends Controller
{

    public static function index()
    {
        $items = new Like();
        return $items->all();
    }
    public static function show($request)
    {
        // return [1];
        $item = new Like();
        return $item->find($request['id']);
    }

    public static function store()
    {
        if (Request::validate([
            'event_id',
            'user_id',
        ])) {
            $params = Request::params();
            $instance = new Like();
            // $mail = new Mail();
            $item =  $instance->create(
                [
                    'event_id' => $params["event_id"],
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
        $items = new Like();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new Like();
        $item->delete();
        return "succes";
    }
}
