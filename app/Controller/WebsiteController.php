<?php 
namespace App\Controller;


// save mail in DB
class WebsiteController extends Controller
{
    public static function home() {
        return view('home/index');
    }
    public static function blogs() {
        return view('blog/index');
    }
    public static function partanariat() {
        return view('partenariat/index');
    }

    public static function error($code = 404) {
        http_response_code(404);
        // header("HTTP/1.1 404 Not Found");
        return view('errors/404');
    }

}

function view($path)
{
    require('pages/'.$path . '.php');
}
