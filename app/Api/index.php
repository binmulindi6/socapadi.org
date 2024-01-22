<?php

use App\Controller\Auth\AuthenticationController;
use App\Controller\EventController;
use App\Controller\PaymentController;
use App\Controller\ReservationController;
use App\Controller\TicketController;
use App\Controller\UserController;
use App\Http\Request;
use App\Middleware\AbilityMiddleware;
use App\Middleware\AuthMiddleware;

require_once 'vendor/autoload.php';

// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Allow specific HTTP methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");



//AUTH
if (Request::post('/auth', true)) {
    (Request::post('/auth/register') && ($data = AuthenticationController::register()))
        ?: ((Request::post('/auth/authenticate') && ($data = AuthenticationController::login())))
        ?:  NotFound();
}

//BIG PUBLIC ROUTE
(Request::get('/api/get_events') && ($data = EventController::index()));

//ALL GETS GOES HERE
if (Request::get('/api', true) && !isset($data)) {
    //GET EVENTS
    if (AuthMiddleware::check()) {
        if (Request::get('/api/events', true)) {
            ((Request::get('/api/events')) && ($data = EventController::index()))
                ?: (Request::get('/api/events', false, ['id']) && $data = EventController::show(Request::getParams(['id'])))
                ?: (Request::get('/api/events/reservations', false, ['id']) && $data = EventController::reservations(Request::getParams(['id'])))
                ?: (Request::get('/api/events/payments', false, ['id']) && $data = EventController::payments(Request::getParams(['id'])))
                ?:  NotFound();
        }
        //GET USERS
        if (Request::get('/api/users', true)) {
            (Request::get('/api/users') && ($data = UserController::index()))
                ?: (Request::get('/api/users', false, ['id']) && $data = UserController::show(Request::getParams(['id'])))
                ?:  NotFound();
        }
        //GET RESERVATIONS
        if (Request::get('/api/reservations', true)) {
            (Request::get('/api/reservations') && ($data = ReservationController::index()))
                ?: (Request::get('/api/reservations', false, ['id']) && $data = ReservationController::show(Request::getParams(['id'])))
                ?:  NotFound();
        }
        //GET PAYMENTS
        if (Request::get('/api/payments', true)) {
            (Request::get('/api/payments') && ($data = TicketController::index()))
                ?: (Request::get('/api/payments', false, ['id']) && $data = TicketController::show(Request::getParams(['id'])))
                ?:  NotFound();
        }
    } else {
        http_response_code(403);
        $data = "Unauthorized";
    }

    !$data && NotFound();
}


//ALL GETS GOES HERE
if (Request::post('/api', true)) {
    //MIDDELEWARE
    if (AuthMiddleware::check()) {
        //POST EVENTS
        if (Request::post('/api/event', true)) {
            (Request::post('/api/events/store') && AbilityMiddleware::check(['admin']) && ($data = EventController::store()))
                ?: (Request::post('/api/events/update') && AbilityMiddleware::check(['admin', 'manager']) && ($data = EventController::update()))
                ?: (Request::post('/api/events/create_manager') && AbilityMiddleware::check(['admin']) && ($data = EventController::createManager()))
                ?: (Request::post('/api/events/create_operator') && AbilityMiddleware::check(['admin', 'manager']) && ($data = EventController::createOperator()))
                ?: (Request::post('/api/events/reserve') && AbilityMiddleware::check(['simple', 'admin']) && ($data = ReservationController::store()))
                ?: (Request::post('/api/events/pay') && AbilityMiddleware::check(['simple', 'admin']) && ($data = PaymentController::store()))
                ?:  NotFound();
        }

        if (Request::post('/api/user', true)) {
            (Request::post('/api/users/change_status') && AbilityMiddleware::check(['admin',]) && ($data = UserController::changStatus()))
                ?: (Request::post('/api/users/make_admin') && AbilityMiddleware::check(['admin']) && ($data = UserController::makeAdmin()))
                ?:  NotFound();
        }

        !$data && NotFound();
    } else {
        http_response_code(403);
        $data = "Unauthorized";
    }
}



if (isset($data)) {
    echo json_encode($data, JSON_PRETTY_PRINT);
}

function NotFound()
{
    http_response_code(404);
}
