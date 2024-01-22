<?php
require_once 'vendor/autoload.php';

use App\Http\Request;
use App\Controller\WebsiteController;
// use App\Component\Component;

require('app/Api/index.php');
// echo 122;

//views
if (Request::get() && (Request::post() || (!Request::get('/api', true) && !Request::get('/auth', true)))) {

    // if()
    Request::get('/') ? WebsiteController::home() : (
        Request::get('/blog') ? WebsiteController::blogs() : (
            Request::get('/partenariat') ? WebsiteController::partanariat() :
            NotFound()));
}
