<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Ticket;

// save mail in DB
class TicketController extends Controller
{

    public static function index()
    {
        $items = new Ticket();
        return [];
    }
    public static function show($request)
    {
        // return [1];
        $item = new Ticket();
        return $item->find($request['id']);
    }

    public static function store()
    {
        if (Request::validate([
            'code',
            'event_id',
            'ticket_category_id',
            'user_id',
        ])) {
            $params = Request::params();
            $instance = new Ticket();
            // $mail = new Mail();
            $item =  $instance->create(
                [
                    'code' => $params["code"],
                    'event_id' => $params["event_id"],
                    'ticket_category_id' => $params["ticket_category_id"],
                    'user_id' => $params["user_id"],
                    'spot' => isset($params["spot"]) ? $params["spot"] : null,
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
        $items = new Ticket();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new Ticket();
        $item->delete();
        return "succes";
    }
}
