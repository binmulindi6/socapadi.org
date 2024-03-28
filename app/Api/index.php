<?php

use App\Controller\Auth\AuthenticationController;
use App\Controller\UserController;
use App\Http\Request;
use App\Middleware\AbilityMiddleware;
use App\Middleware\AuthMiddleware;

require_once 'vendor/autoload.php';
date_default_timezone_set("Africa/Kigali");

$host = ""; #you host url, if the api has not  a dedicated domain name

//AUTH
if (Request::post($host . '/auth', true)) {
    (Request::post($host . '/auth/register') && ($data = AuthenticationController::register()))
        ?: ((Request::post($host . '/auth/authenticate') && ($data = AuthenticationController::login())))
        ?:  NotFound();
}


//ALL GETS GOES HERE
if (Request::get($host . '/api', true) && !isset($data)) {
    //GET EVENTS
    if (AuthMiddleware::check()) { //AuthMiddleware to check if the your is logged in
        //GET USERS
        if (Request::get($host . '/api/users', true)) {
            (Request::get($host . '/api/users') && AbilityMiddleware::check(['admin']) &&  ($data = UserController::index()))
                ?: (Request::get($host . '/api/users', false, ['id']) && AbilityMiddleware::check(['admin']) && $data = UserController::show(Request::getParams(['id'])))
                ?:  NotFound();
        }
    } else {
        http_response_code(403);
        $data = "Unauthorized";
    }

    !isset($data) && NotFound();
}


//ALL POSTS GO HERE
if (Request::post($host . '/api', true)) {
    //MIDDELEWARE
    if (AuthMiddleware::check() && !isset($data)) { //AuthMiddleware to check if the your is logged in
        //Users
        if (Request::post($host . '/api/user', true)) {
            (Request::post($host . '/api/users/change_status') && AbilityMiddleware::check(['admin']) && ($data = UserController::changStatus()))
                ?: (Request::post($host . '/api/users/update') && AbilityMiddleware::check(['admin']) && ($data = UserController::update()))
                ?: (Request::post($host . '/api/users/make_admin') && AbilityMiddleware::check(['admin']) && ($data = UserController::makeAdmin()))
                ?:  NotFound();
        }
        !isset($data) && NotFound();
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
//views
if (Request::get() && (!Request::post() || (!Request::get($host . '/api', true) && !Request::get($host  . '/auth', true)))) {


    Request::get($host . '/') && $data = [
        "welcome"  => "Php REST API by binmulindi6",
        "routes" => [
            "public" => [
                "/" => 'this welcome page',
                '/auth/register' => 'Registration',
                '/auth/authetication' => 'Registration',
            ]
        ]
    ];
}

if (isset($data)) {
    echo json_encode($data, JSON_PRETTY_PRINT);
} else {
    NotFound();
}

function NotFound() // 404 function
{
    http_response_code(404);
}
