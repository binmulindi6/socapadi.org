<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Payment;

// save mail in DB
class PaymentController extends Controller
{

    public static function index()
    {
        $items = new Payment();
        return $items->all();
    }
    public static function show($request)
    {
        // return [1];
        $item = new Payment();
        return $item->find($request['id']);
    }

    public static function store()
    {
        if (Request::validate([
            'code',
            'name_holder',
            // 'spot',
            "ticket_category_id",
            'event_id',
            'user_id',
            'payment_method_id',
            // 'telephone',
        ])) {
            $params = Request::params();
            $instance = new Payment();
            // $mail = new Mail();
            $item =  $instance->create(
                [
                    'code' => $params["code"],
                    'name_holder' => $params["name_holder"],
                    'event_id' => $params["event_id"],
                    'user_id' => $params["user_id"],
                    'payment_method_id' => $params["payment_method_id"],
                    'ticket_category_id' => $params["ticket_category_id"],
                    'telephone' => isset($params["telephone"]) ? $params["telephone"] : NULL,
                    'spot' => isset($params["spot"]) ? $params["spot"] : NULL,
                    'created_at' => date('Y-m-d h:i'),
                ]
            );

            // return $created->send();
            return $item;
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function search()
    {
        $items = new Payment();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new Payment();
        $item->delete();
        return "succes";
    }
}
