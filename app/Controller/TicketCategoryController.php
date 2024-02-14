<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\TicketCategory;

// save mail in DB
class TicketCategoryController extends Controller
{

    public static function index()
    {
        $items = new TicketCategory();
        return $items->all();
    }
    public static function show($request)
    {
        // return [1];
        $item = new TicketCategory();
        return $item->find($request['id']);
    }

    public static function store()
    {
        if (Request::validate([
            'type',
            'price',
            'currency',
            // 'spots',
            'event_id',
        ])) {
            $params = Request::params();
            $instance = new TicketCategory();
            // $mail = new Mail();
            $item =  $instance->create(
                [
                    'type' => $params["type"],
                    'price' => $params["price"],
                    'currency' => $params["currency"],
                    'spots' => isset($params["spots"]) ? $params["spots"] : NULL,
                    'available' => isset($params["spots"]) ? $params["spots"] : NULL,
                    'event_id' => $params["event_id"],
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
    public static function update()
    {
        $params = Request::params();
        $instance = new TicketCategory();


        if (Request::validate([
            'ticket_category_id',
            'type',
            'price',
            'currency',
            // 'spots',
            // 'event_id',
        ])) {
            $self = $instance->find($params['ticket_category_id']);
            if ($self) {
                // $mail = new Mail();
                $item =  $self->save(
                    [
                        'type' => $params["type"],
                        'price' => $params["price"],
                        'currency' => $params["currency"],
                        // 'spots' => isset($params["spots"]) ? $params["spots"] : NULL,
                        // 'available' => isset($params["spots"]) ? $params["spots"] : NULL,
                        // 'event_id' => $params["event_id"],
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
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function search()
    {
        $items = new TicketCategory();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new TicketCategory();
        $item->delete();
        return "succes";
    }
}
