<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Reservation;

// save mail in DB
class ReservationController extends Controller
{

    public static function index()
    {
        $items = new Reservation();
        return $items->all();
    }
    public static function show($request)
    {
        // return [1];
        $item = new Reservation();
        return $item->find($request['id']);
    }

    public static function store()
    {
        if (Request::validate([
            'event_id',
            'ticket_category_id',
            'user_id',
            // 'spot',
        ])) {
            $params = Request::params();
            $instance = new Reservation();
            // $mail = new Mail();
            $item =  $instance->create(
                [
                    'event_id' => $params["event_id"],
                    'ticket_category_id' => $params["ticket_category_id"],
                    'user_id' => $params["user_id"],
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
        $items = new Reservation();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new Reservation();
        $item->delete();
        return "succes";
    }
}
