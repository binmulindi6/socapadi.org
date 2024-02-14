<?php

use App\Controller\Auth\AuthenticationController;
use App\Controller\EventCategoryController;
use App\Controller\EventController;
use App\Controller\LikeController;
use App\Controller\PaymentController;
use App\Controller\PaymentMethodController;
use App\Controller\ReservationController;
use App\Controller\TicketCategoryController;
use App\Controller\TicketController;
use App\Controller\UserController;
use App\Http\Request;
use App\Middleware\AbilityMiddleware;
use App\Middleware\AuthMiddleware;

require_once 'vendor/autoload.php';

$host = "/kwetueventsapi";
// echo var_dump($_SERVER['REQUEST_URI']);

//AUTH
if (Request::post($host . '/auth', true)) {
    (Request::post($host . '/auth/register') && ($data = AuthenticationController::register()))
        ?: ((Request::post($host . '/auth/authenticate') && ($data = AuthenticationController::login())))
        ?:  NotFound();
}

//BIG PUBLIC ROUTE
(Request::get($host . '/api/get_events') && ($data = EventController::index()));
(Request::get($host . '/api/events/hots') && ($data = EventController::hots()));
(Request::get($host . '/api/events/next') && ($data = EventController::next()));

//ALL GETS GOES HERE
if (Request::get($host . '/api', true) && !isset($data)) {
    //GET EVENTS
    if (AuthMiddleware::check()) {
        if (Request::get($host . '/api/events', true)) {
            ((Request::get($host . '/api/events')) && ($data = EventController::index()))
                ?: (Request::get($host . '/api/events', false, ['id']) && $data = EventController::show(Request::getParams(['id'])))
                ?: (Request::get($host . '/api/events/reservations', false, ['id']) && $data = EventController::reservations(Request::getParams(['id'])))
                ?: (Request::get($host . '/api/events/tickets/categories', false, ['id']) && $data = EventController::ticketCategories(Request::getParams(['id'])))
                ?: (Request::get($host . '/api/events/payments', false, ['id']) && $data = EventController::payments(Request::getParams(['id'])))
                ?: (Request::get($host . '/api/events/tickets', false, ['id']) && $data = EventController::tickets(Request::getParams(['id'])))
                ?:  NotFound();
        }

        (Request::get($host . '/api/categories') && ($data = EventCategoryController::index()));
        //GET USERS
        if (Request::get($host . '/api/users', true)) {
            (Request::get($host . '/api/users') && ($data = UserController::index()))
                ?: (Request::get($host . '/api/users', false, ['id']) && $data = UserController::show(Request::getParams(['id'])))
                ?: (Request::get($host . '/api/users/reservations', false, ['id']) && $data = UserController::getReservations(Request::getParams(['id'])))
                ?: (Request::get($host . '/api/users/payments', false, ['id']) && $data = UserController::getPayments(Request::getParams(['id'])))
                ?: (Request::get($host . '/api/users/notifications', false, ['id']) && $data = UserController::getNotifications(Request::getParams(['id'])))
                ?: (Request::get($host . '/api/users/tickets', false, ['id']) && $data = UserController::getTickets(Request::getParams(['id'])))
                ?:  NotFound();
        }
        //GET RESERVATIONS
        if (Request::get($host . '/api/reservations', true)) {
            (Request::get($host . '/api/reservations') && ($data = ReservationController::index()))
                ?: (Request::get($host . '/api/reservations', false, ['id']) && $data = ReservationController::show(Request::getParams(['id'])))
                ?:  NotFound();
        }
        //GET PAYMENTS
        if (Request::get($host . '/api/payments', true)) {
            (Request::get($host . '/api/payments') && ($data = TicketController::index()))
                ?: (Request::get($host . '/api/payments/methods') && $data = PaymentMethodController::index())
                ?: (Request::get($host . '/api/payments', false, ['id']) && $data = TicketController::show(Request::getParams(['id'])))
                ?:  NotFound();
        }
    } else {
        http_response_code(403);
        $data = "Unauthorized";
    }

    !$data && NotFound();
}


//ALL GETS GOES HERE
if (Request::post($host . '/api', true)) {
    //MIDDELEWARE
    if (AuthMiddleware::check() && !isset($data)) {
        (Request::post($host . '/api/events/view')) && ($data = EventController::view());
        ((Request::post($host . '/api/events_categories') && AbilityMiddleware::check(['admin',])) && ($data = EventCategoryController::store()));
        //POST EVENTS
        if (Request::post($host . '/api/event', true)) {
            (Request::post($host . '/api/events/store') && AbilityMiddleware::check(['admin']) && ($data = EventController::store()))
                ?: (Request::post($host . '/api/events/update') && AbilityMiddleware::check(['admin', 'manager']) && ($data = EventController::update()))
                // ?: (Request::post($host . '/api/events/create_manager') && AbilityMiddleware::check(['admin']) && ($data = EventController::createManager()))
                ?: (Request::post($host . '/api/events/create_user') && AbilityMiddleware::check(['admin', 'manager']) && ($data = EventController::createUser()))
                ?: (Request::post($host . '/api/events/reserve') && AbilityMiddleware::check(['simple', 'admin']) && ($data = ReservationController::store()))
                ?: (Request::post($host . '/api/events/reserve_many') && AbilityMiddleware::check(['simple', 'admin']) && ($data = ReservationController::storeMany()))
                ?: (Request::post($host . '/api/events/pay') && AbilityMiddleware::check(['simple', 'admin']) && ($data = PaymentController::store()))
                ?: (Request::post($host . '/api/events/pay_many') && AbilityMiddleware::check(['simple', 'admin']) && ($data = PaymentController::storeMany()))
                ?: (Request::post($host . '/api/events/like') && AbilityMiddleware::check(['simple']) && ($data = LikeController::store()))
                ?: (Request::post($host . '/api/events/change_status') && AbilityMiddleware::check(['admin']) && ($data = EventController::changStatus()))
                ?:  NotFound();
        }


        //Users
        if (Request::post($host . '/api/user', true)) {
            (Request::post($host . '/api/users/change_status') && AbilityMiddleware::check(['admin']) && ($data = UserController::changStatus()))
                ?: (Request::post($host . '/api/users/update') && AbilityMiddleware::check(['admin', 'simple']) && ($data = UserController::update()))
                ?: (Request::post($host . '/api/users/make_admin') && AbilityMiddleware::check(['admin']) && ($data = UserController::makeAdmin()))
                ?:  NotFound();
        }

        //Ticktes
        if (Request::post($host . '/api/tickets', true)) {
            (Request::post($host . '/api/tickets/categories') && AbilityMiddleware::check(['admin', 'manager']) && ($data = TicketCategoryController::store()))
                ?: (Request::post($host . '/api/tickets/categories/update') && AbilityMiddleware::check(['admin', 'manager']) && ($data = TicketCategoryController::update()))
                ?:  NotFound();
        }
        //RESERVATIONS
        if (Request::post($host . '/api/reservations', true)) {
            (Request::post($host . '/api/reservations/change_status') && AbilityMiddleware::check(['admin', 'manager', 'operator']) && ($data = ReservationController::changStatus()))
                ?:  NotFound();
        }
        //PAYMENT
        if (Request::post($host . '/api/payments', true)) {
            (Request::post($host . '/api/payments/change_status') && AbilityMiddleware::check(['admin', 'manager', 'operator']) && ($data = PaymentController::changStatus()))
                ?: (Request::post($host . '/api/payments/methods/store') && AbilityMiddleware::check(['admin']) && ($data = PaymentMethodController::store()))
                ?:  NotFound();
        }

        !$data && NotFound();
    } else {
        http_response_code(403);
        $data = "Unauthorized";
    }
}


// Allow requests from any origin
header("Access-Control-Allow-Origin: *");

// Allow specific HTTP methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if (isset($data)) {
    echo json_encode($data, JSON_PRETTY_PRINT);
}

function NotFound()
{
    http_response_code(404);
}
