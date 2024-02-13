<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\EventCategory;

// save mail in DB
class EventCategoryController extends Controller
{

    public static function index()
    {
        $items = new EventCategory();
        return $items->all();
    }
    public static function show($request)
    {
        // return [1];
        $item = new EventCategory();
        return $item->find($request['id']);
    }

    public static function store()
    {
        if (Request::validate([
            'name',
            // 'cover',
        ])) {
            $params = Request::params();
            $instance = new EventCategory();
            // $mail = new Mail();
            $item =  $instance->create(
                [
                    'name' => $params["name"],
                    'cover' => $params["cover"] ? $params["cover"] : '',
                    'created_at' => date('Y-m-d h:i'),
                    'updated_at' => date('Y-m-d h:i'),
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
        $items = new EventCategory();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new EventCategory();
        $item->delete();
        return "succes";
    }
}
