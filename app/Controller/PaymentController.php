<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Payment;
use App\Model\Notification;
use App\Model\TicketCategory;
use App\Controller\Auth\AuthenticationController;

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
    public static function storeMany()
    {
        $params = Request::params();
        // Get the raw POST data
        $postData = file_get_contents("php://input");

        // Decode JSON data
        $dataArray = json_decode($postData, true);
        if ($dataArray !== null) {

            foreach ($dataArray as $data) {
                $instance = new Payment();
                $ticketCatInstance = new TicketCategory();
                $ticketCat = $ticketCatInstance->find($data['ticket_category_id']);
                $spot = $ticketCat->assignSpot();
                $item =  $instance->create(
                    [
                        'code' => $data["code"],
                        'name_holder' => $data["name_holder"],
                        'event_id' => $data["event_id"],
                        'user_id' => $data["user_id"],
                        'payment_method_id' => $data["payment_method_id"],
                        'ticket_category_id' => $data["ticket_category_id"],
                        'telephone' => isset($data["telephone"]) ? $data["telephone"] : NULL,
                        'spot' => isset($data["spot"]) ? $spot : NULL,
                        'created_at' => date('Y-m-d h:i'),
                    ]
                );

                // return $item;
            }

            Notification::notify($data['user_id'], "Payment Receved", "Your Payment has been receved successfully, for more details check on My Tickets menu", 'payment');
            return 'success';
        } else {
            http_response_code(400);
            return "please check params ";
            return false;
        }
    }

    public static function changStatus()
    {
        if (Request::validate(['id'])) {
            $params = Request::params();
            if (isset($params['id'])) {
                $instance = new Payment();
                $self =  $instance->find($params['id']);
                $user = AuthenticationController::user();
                if (isset($params['verified']) && $user) {
                    $self->save(
                        [
                            "verified" => $params['verified'],
                            "verified_by" => $user->id,
                            "verified_at" => date('Y-m-d h:i'),
                            "updated_at" => date('Y-m-d h:i')
                        ]
                    );
                }
                if (isset($params['approved']) && $user) {
                    $self->save(
                        [
                            "approved" => $params['approved'],
                            "approved_by" => $user->id,
                            "approved_at" => date('Y-m-d h:i'),
                            "updated_at" => date('Y-m-d h:i')
                        ]
                    );
                }

                if ($user) {
                    return "success";
                } else {
                    // return "oklm";
                    http_response_code(403);
                    return "Access Denied ";
                }
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

        // Notification::notify($data['user_id'], "Reservation Receved", "Your Reseravtion has been made successfully, for more details check on My Tickets menu", 'event');
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
