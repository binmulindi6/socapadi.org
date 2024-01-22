<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\PaymentMethod;

// save mail in DB
class PaymentMethodController extends Controller
{

    public static function index()
    {
        $items = new PaymentMethod();
        return $items->all();
    }
    public static function show($request)
    {
        // return [1];
        $item = new PaymentMethod();
        return $item->find($request['id']);
    }

    public static function store()
    {
        if (Request::validate([
            'event_id',
            'name',
            'number',
            'cover',
        ])) {
            $params = Request::params();
            $instance = new PaymentMethod();
            // $mail = new Mail();
            $item =  $instance->create(
                [
                    'event_id' => $params["event_id"],
                    'name' => $params["name"],
                    'number' => $params["number"],
                    'cover' => $params["cover"],
                    'created_at' => date('Y-m-d h:i'),
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
        $items = new PaymentMethod();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new PaymentMethod();
        $item->delete();
        return "succes";
    }
}
