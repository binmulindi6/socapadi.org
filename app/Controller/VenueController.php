<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Venue;

// save mail in DB
class VenueController extends Controller
{

    public static function index()
    {
        $items = new Venue();
        return $items->all();
    }
    public static function show($request)
    {
        // return [1];
        $item = new Venue();
        return $item->find($request['id']);
    }

    public static function store()
    {
        if (Request::validate([
            'name',
            'location',
            'date',
            'capacity',
            'contacts',
        ])) {
            $params = Request::params();
            $instance = new Venue();
            // $mail = new Mail();
            $item =  $instance->create(
                [
                    'name' => $params["name"],
                    'location' => $params["location"],
                    'ln' => isset($params["ln"]) ? $params["ln"] : null,
                    'lat' => isset($params["lat"]) ? $params["lat"] : null,
                    'date' => $params["date"],
                    'capacity' => $params["capacity"],
                    'contacts' => $params["contacts"],
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
        $items = new Venue();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new Venue();
        $item->delete();
        return "succes";
    }
}
