<?php

use App\Http\Request;
use App\Controller\BlogController;
use App\Controller\MailController;
use App\Controller\UserController;
use App\Middleware\AuthMiddleware;
use App\Controller\WebsiteController;
use App\Middleware\AbilityMiddleware;
use App\Controller\Auth\AuthenticationController;
use App\Controller\ProjectController;

require_once 'vendor/autoload.php';
date_default_timezone_set("Africa/Kigali");
session_start();
// echo 10;
// $host = "/socapadi.org"; #you host url, if the api has not  a dedicated domain name
$host = "";
//AUTH
if (Request::get($host . '/api/blogs', true)) {
    (Request::get($host . '/api/blogs') &&  ($data = BlogController::index()))
        ?: (Request::get($host . '/api/blogs/latest') &&  ($data = BlogController::latest()))
        ?: (Request::get($host . '/api/blog', false, ['id']) && $data = BlogController::show(Request::getParams(['id'])))
        // echo 10;
        ?:  NotFound();
} else


if (Request::get($host . '/api/projects', true)) {
    (Request::get($host . '/api/projects') &&  ($data = ProjectController::index()))
        ?: (Request::get($host . '/api/projects/latest') &&  ($data = ProjectController::latest()))
        ?: (Request::get($host . '/api/projects', false, ['id']) && $data = ProjectController::show(Request::getParams(['id'])))
        // echo 10;
        ?:  NotFound();
} else


    //ALL GETS GOES HERE
    if (Request::get($host . '/api', true) && !isset($data)) {
        //GET EVENTS

        if (Request::get($host . '/api/users', true)) {
            (Request::get($host . '/api/users') &&  ($data = UserController::index()))
                ?: (Request::get($host . '/api/users', false, ['id']) && $data = UserController::show(Request::getParams(['id'])))
                ?:  NotFound();
        } else
            !isset($data) && NotFound();
    } else


        //ALL POSTS GO HERE
        if (Request::post($host . '/api', true)) {
            //MIDDELEWARE

            if (Request::post($host . '/api/user', true)) {
                (Request::post($host . '/api/users/change_status') && ($data = UserController::changStatus()))
                    ?: (Request::post($host . '/api/users/update') && ($data = UserController::update()))
                    ?: (Request::post($host . '/api/users/make_admin') && ($data = UserController::makeAdmin()))
                    ?:  NotFound();
            } else if (Request::post($host . '/api/blogs', true)) {
                (Request::post($host . '/api/blogs/post') && ($data = BlogController::store()))
                    ?: Request::post($host . '/api/blogs/update') && ($data = BlogController::update())
                    ?: Request::post($host . '/api/blogs/delete') && ($data = BlogController::destroy())
                    ?:  NotFound();
            } else if (Request::post($host . '/api/projects', true)) {
                (Request::post($host . '/api/projects/store') && ($data = ProjectController::store()))
                    ?: Request::post($host . '/api/projects/update') && ($data = ProjectController::update())
                    ?: Request::post($host . '/api/projects/delete') && ($data = ProjectController::destroy())
                    ?:  NotFound();
            } elseif (Request::post($host . '/api/send_mail', true)) {

                (Request::post($host . '/api/send_mail') && ($data = MailController::store()))
                    ?: (Request::post($host . '/api/send_mail/news_letter') && ($data = MailController::register()))
                    ?:  NotFound();
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
    (Request::get($host . '/') || Request::get($host . '/index')) && WebsiteController::home()
        ?: Request::get($host . '/blog-details') && WebsiteController::blog_details()
        ?: Request::get($host . '/staff') && WebsiteController::staff()
        ?: Request::get($host . '/vision-mission') && WebsiteController::vision()
        //all
        ?: Request::get($host . '/articles') && WebsiteController::blog('articles')
        ?: Request::get($host . '/rapports') && WebsiteController::blog('rapports')
        ?: Request::get($host . '/actualites') &&  WebsiteController::blog('actualites')
        ?: Request::get($host . '/autres') && WebsiteController::blog('autres')
        // ?: var_dump(Request::get($host . '/actualités', true, ['id']))
        ?: Request::get($host . '/show/articles', true, ['id']) && WebsiteController::get_blog('articles', Request::getParams(['id']))
        ?: (Request::get($host . '/show/actualites', true, ['id']) || Request::get($host . '/actualités', true, ['id'])) &&  WebsiteController::get_blog('actualites', Request::getParams(['id']))
        ?: Request::get($host . '/show/rapports', true, ['id']) &&  WebsiteController::get_blog('rapports', Request::getParams(['id']))
        ?: Request::get($host . '/show/autres', true, ['id']) &&  WebsiteController::get_blog('autres', Request::getParams(['id']))

        //others
        ?: Request::get($host . '/contact') && WebsiteController::contact()
        ?: Request::get($host . '/projects-realises') && WebsiteController::projects()
        ?: Request::get($host . '/projects-encours') && WebsiteController::projects(false)
        ?: Request::get($host . '/project-details', true, ['id']) && WebsiteController::project_details(Request::getParams(['id']))
        ?: Request::get($host . '/service-details') && WebsiteController::service_details()
        ?: Request::get($host . '/service-1') && WebsiteController::services(1)
        ?: Request::get($host . '/service-2') && WebsiteController::services(2)

        ///admin side
        ?: Request::get($host . '/dashboard')  && WebsiteController::dashboard()
        ?: Request::get($host . '/admin/blog')  && WebsiteController::admin_blog()
        ?: Request::get($host . '/admin/projects')  && WebsiteController::admin_projects()
        ?: Request::get($host . '/admin/post-blog')  && WebsiteController::admin_post_blog()
        ?: Request::get($host . '/admin/post-project')  && WebsiteController::admin_post_project()
        ?: Request::get($host . '/admin/edit-post', true, ['id'])  && WebsiteController::edit_blog(Request::getParams(['id']))
        ?: Request::get($host . '/admin/edit-project', true, ['id'])  && WebsiteController::edit_project(Request::getParams(['id']))
        ?: !isset($data) && NotFound();
} elseif (
    Request::post() && (!Request::post($host . '/api', true))
) {
    Request::post($host . '/login')  && AuthenticationController::loginWeb();
    Request::post($host . '/logout')  && AuthenticationController::logoutWeb();
}

if (isset($data)) {
    echo json_encode($data, JSON_PRETTY_PRINT);
} else {
    NotFound();
}

function NotFound() // 404 function
{
    // die();
    http_response_code(404);
}
