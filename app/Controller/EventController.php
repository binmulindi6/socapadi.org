<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Event;
use DateTime;

use function PHPSTORM_META\map;

// save mail in DB
class EventController extends Controller
{

    public static function index()
    {
        $events = new Event();
        // var_dump($events->latest());
        // die();
        $data = array_map(function ($arr) {
            return $arr->charge();
        }, $events->latest());
        return $data;
    }
    public static function hots()
    {
        $events = new Event();
        $data = array_map(function ($arr) {
            return $arr->charge();
        }, $events->sponsored());
        return $data;
    }
    public static function next()
    {
        $events = new Event();
        $data = array_map(function ($arr) {
            return $arr->charge();
        }, $events->next());
        // return $events->next();
        return $data[0];
    }

    public static function show($request)
    {
        // return [1];
        $instance = new Event();
        $event = $instance->find($request['id']);
        return $event->chargeAll();
    }

    public static function destroy($request)
    {
        $event = new Event();
        $event->delete();
        return "succes";
    }

    public static function store()
    {
        if (Request::validate([
            'title',
            'description',
            'event_category_id',
            'organiser',
            'date',
            'email',
            'contacts',
            'venue',
            'start_time',
        ])) {
            $params = Request::params();
            $instance = new Event();
            // $mail = new Mail();
            $cover = $instance->uploadImage('cover', "events/");
            if ($cover) {
                $ecole =  $instance->create(
                    [
                        'event_category_id' => $params["event_category_id"],
                        'title' => $params["title"],
                        'description' => $params["description"],
                        // 'organiser' => $params["organiser"],
                        'date' => $params["date"],
                        'email' => $params["email"],
                        'banner' => $cover,
                        'contacts' => $params["contacts"],
                        'venue' => $params["venue"],
                        'venue_id' => isset($params["venue_id"]) ? $params['venue_id'] : null,
                        'start_time' => $params["start_time"],
                        'end_time' => isset($params["end_time"]) ? $params['end_time'] : null,
                        'door_open_time' => isset($params["door_open_time"]) ? $params['door_open_time'] : $params['start_time'],
                        'created_at' => date('Y-m-d h:i'),
                    ]
                );

                // return $created->send();
                return "success";
            } else {
                http_response_code(500);
                return "image not uploaded";
            }
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }

    public static function update()
    {
        $params = Request::params();
        $instance = new Event();
        $self =  $instance->find($params['event_id']);
        if (Request::validate([
            'title',
            'description',
            'organiser',
            'date',
            'email',
            'contacts',
            'venue',
            'start_time',
        ]) && $self) {
            // var_dump($self);
            // die();
            $self->save([
                "title" => $params["title"],
                "description" => $params["description"],
                "organiser" => $params["organiser"],
                "date" => $params["date"],
                // "email" => $params["email"] === $self->email,
                "contacts" => $params["contacts"],
                "venue" => $params["venue"],
                "venue_id" => isset($params["venue_id"]) ? $params['venue_id'] : null,
                "start_time" => $params["start_time"],
                "end_time" => isset($params["end_time"]) ? $params['end_time'] : null,
                "door_open_time" => isset($params["door_open_time"]) ? $params['door_open_time'] : $params['start_time'],
                "updated_at" => date('Y-m-d h:i'),
            ]);
            return "success";
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function view()
    {
        $params = Request::params();
        $instance = new Event();
        $self =  $instance->find($params['event_id']);
        if (Request::validate([
            'event_id',
        ]) && $self) {
            $self->viewed();
            return "success";
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }

    public static function createManager()
    {
        $params = Request::params();
        $instance = new Event();
        $self =  $instance->find($params['event_id']);

        if ($self) {
            return UserController::createManager();
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function createOperator()
    {
        $params = Request::params();
        $instance = new Event();
        $self =  $instance->find($params['event_id']);

        if ($self) {
            return UserController::addOperator();
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }

    public static function reservations($request)
    {
        // return [1];
        $instance = new Event();
        $event = $instance->find($request['id']);
        return $event->reservations();
    }
    public static function payments($request)
    {
        // return [1];
        $instance = new Event();
        $event = $instance->find($request['id']);
        return $event->payments();
    }
    public static function ticketCategories($request)
    {
        // return [1];
        $instance = new Event();
        $event = $instance->find($request['id']);
        return $event->ticket_categories();
    }
}
