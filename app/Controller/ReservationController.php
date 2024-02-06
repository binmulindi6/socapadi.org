<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Notification;
use App\Model\Reservation;
use App\Model\TicketCategory;

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
            'code',
            'name_holder',
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
                    'code' => $params["code"],
                    'name_holder' => $params["name_holder"],
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
    public static function storeMany()
    {

        $params = Request::params();
        // Get the raw POST data
        $postData = file_get_contents("php://input");

        // Decode JSON data
        $dataArray = json_decode($postData, true);
        if ($dataArray !== null) {

            foreach ($dataArray as $data) {
                $instance = new Reservation();
                $ticketCatInstance = new TicketCategory();
                $ticketCat = $ticketCatInstance->find($data['ticket_category_id']);
                $spot = $ticketCat->assignSpot();
                $item =  $instance->create(
                    [
                        'event_id' => $data["event_id"],
                        'code' => $data["code"],
                        'name_holder' => $data["name_holder"],
                        'ticket_category_id' => $data["ticket_category_id"],
                        'user_id' => $data["user_id"],
                        'spot' => isset($data["spot"]) ? $spot : NULL,
                        'created_at' => date('Y-m-d h:i'),
                    ]
                );

                // return $item;
            }

            Notification::notify($data['user_id'], "Reservation Receved", "Your Reseravtion has been made successfully, for more details check on My Tickets menu", 'event');
            return 'success';
        } else {
            http_response_code(400);
            return "please check params ";
            return false;
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
