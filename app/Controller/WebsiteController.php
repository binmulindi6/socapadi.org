<?php

namespace App\Controller;

use App\Model\Blog;
use App\Model\Staff;
use App\Http\Session;
use App\Model\Project;


// save mail in DB
class WebsiteController extends Controller
{
    public static $websiteData = [
        "name" => "Socapadi",
        "full_name" => "La Société Coopérative Agro-Pastorale pour le Développement Intégral",
        "banner_slogan" => "Créer une communauté agro-pastorale durable et résiliente qui harmonise le développement
                                économique avec la conservation de l’environnement",
        "email" => "bonjour@socapadi.org",
        "phone" => ["+243813668295", "+243997670815"],
        "adresse" => ["No 27, Av. Mwanga, Q. Nyalukemba, C. d’Ibanda, Bukavu, Sud-Kivu, RDC.", "Sangya, Secteur de Tanganyika, Territoire de Fizi, Province du Sud Kivu en République Démocratique du Congo."],
        "projets_encours" => [
            ["id" => "1", "name" => "Kivu Greening", "cover" => "/assets/images/projects/kivugreening.jpeg"],
            ["id" => "2", "name" => "Développement d’une agriculture durable et de la sécurité alimentaire dans l’Est de la RD Congo : Production de céréales et d’oléagineux. Projet en collaboration avec ICCM-DRC.", "cover" => "/assets/images/projects/project-2-2.jpg"],
        ],
        "projets_realises" => [
            ["id" => "3", "name" => "Multiplication des boutures de manioc", "cover" => "/assets/images/projects/maniocs.jpg"],
            ["id" => "4", "name" => "Culture de Morinaga Oléifère ", "cover" => "/assets/images/projects/moringa.webp"],
            ["id" => "5", "name" => "Projet Intégré de Croissance Agricole dans les Grands Lacs (PICAGL)", "cover" => "/assets/images/projects/project-1-1.jpg"]
        ]
    ];
    public static function  home()
    {
        return self::view('index');
    }

    public static function staff()
    {
        $staff = Staff::getStaff();
        return self::view('staff', ['staff' => $staff]);
    }
    public static function vision()
    {
        return self::view('vision');
    }
    public static function  blog_details()
    {
        return self::view('blog_details');
    }
    public static function  blog($name)
    {

        switch ($name) {
            case 'articles':
                return self::view('blog', ["title" => "Articles", 'category' => "Article"]);
            case 'rapports':
                return self::view('blog', ["title" => "Rapports", 'category' => "Rapport"]);
            case 'actualites':
                return self::view('blog', ["title" => "Actualités", 'category' => "Actualite"]);
            case 'autres':
                return self::view('blog', ["title" => "Autres", 'category' => "Autre"]);
            default:
                return self::view('blog', ["title" => "Articles", 'category' => "Article"]);
        }
    }
    public static function  get_blog($name, $id)
    {
        $instance = new Blog();
        $latest = $instance->latest(3);
        switch ($name) {
            case 'articles':
                $blog = $instance->findByOptions(['id' => $id]);
                return self::view('blog-details', ["title" => "Articles", 'category' => "Article", 'blog' => $blog, 'latest' => $latest]);
            case 'rapports':
                $blog = $instance->findByOptions(['id' => $id, 'category' => 'Rapport']);
                return self::view('blog-details', ["title" => "Rapports", 'category' => "Rapport", 'blog' => $blog, 'latest' => $latest]);
            case 'actualites':
                $blog = $instance->findByOptions(['id' => $id, 'category' => 'Actualite']);
                return self::view('blog-details', ["title" => "Actualités", 'category' => "Actualite", 'blog' => $blog, 'latest' => $latest]);
            case 'autres':
                $blog = $instance->findByOptions(['id' => $id, 'category' => 'Autre']);
                return self::view('blog-details', ["title" => "Autres", 'category' => "Autre", 'blog' => $blog, 'latest' => $latest]);
                // default:
                //     return self::view('blog-details', ["title" => "Articles", 'category' => "Article", 'blog' => '']);
        }
    }
    public static function contact()
    {
        return self::view('contact');
    }
    public static function project_details($id)

    {
        $instance = new Project();
        $latest = $instance->latest(3);
        // $projets = 
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $project = $instance->find($id);
            $projects = $instance->getByOptions(['state' => 'Réalisé']);
            if ($project) {
                return self::view('project-details', ["item" => $project, '
                ' => $projects, 'latest' => $latest]);
            } else {
                return NotFound();
            }
        } else {
            return NotFound();
        }
    }
    public static function projects($rea = true)
    {
        $instance = new Project();
        if ($rea) {
            $projects = $instance->getByOptions(['state' => 'Réalisé']);
            return self::view('projects-realises', ['projects' => $projects]);
        } else {

            $projects = $instance->getByOptions(['state' => 'Encours']);
            return self::view('projects-encours', ['projects' => $projects]);
        }
    }
    public static function service_details()
    {
        return self::view('service-1');
    }
    public static function services($id)
    {
        return self::view('service-' . $id);
    }



    ////admin side

    //dashboard
    public static function dashboard()
    {
        $blogInstance = new Blog();
        $projectInstance = new Project();
        if (!Session::check()) {
            return htmlView('admin/login');
        } else {
            $articles = $blogInstance->getByOptions(['category' => 'Article']);
            $rapports = $blogInstance->getByOptions(['category' => 'Rapport']);
            $actualites = $blogInstance->getByOptions(['category' => 'Actualite']);
            $autres = $blogInstance->getByOptions(['category' => 'Autre']);
            $projects = $projectInstance->all();;
            return adminPhpView(
                'admin/dashboard',
                [
                    'articles' => count($articles),
                    'rapports' => count($rapports),
                    'actualites' => count($actualites),
                    'autres' => count($autres),
                    'projects' => count($projects),

                ]
            );
        }
    }
    public static function admin_blog()
    {
        if (!Session::check()) {
            return htmlView('admin/login');
        } else {
            return adminView('admin/dashboard-blog');
        }
    }

    public static function admin_projects()
    {
        if (!Session::check()) {
            return htmlView('admin/login');
        } else {
            return adminView('admin/projects');
        }
    }
    public static function edit_blog($blog_id)
    {
        if (!Session::check()) {
            return htmlView('admin/login');
        } else {
            $instance = new Blog();
            if (isset($blog_id) and $instance->find($blog_id)) {
                $blog = $instance->find($blog_id);
                return adminPhpView('admin/edit-blog', ['blog' => $blog]);
            } else {
                NotFound();
            }
        }
    }
    public static function edit_project($id)
    {
        if (!Session::check()) {
            return htmlView('admin/login');
        } else {
            $instance = new Project();
            if (isset($id) and $instance->find($id)) {
                $blog = $instance->find($id);
                return adminPhpView('admin/edit-project', ['project' => $blog]);
            } else {
                NotFound();
            }
        }
    }
    public static function admin_post_blog()
    {

        if (!Session::check()) {
            return htmlView('admin/login');
        } else {
            return adminView('admin/post-blog');
        }
    }
    public static function admin_post_project()
    {

        if (!Session::check()) {
            return htmlView('admin/login');
        } else {
            return adminView('admin/post-project');
        }
    }

    ////admin side



    public static function  error($code = 404)
    {
        http_response_code(404);
        // header("HTTP/1.1 404 Not Found");
        return self::view('errors/404');
    }
    public static function  view($path, $viewData = [])
    {
        $data = [];
        $data['website'] = self::$websiteData;
        $data['data'] = $viewData;
        extract($data['data']);
        if (file_exists('pages/website/' . $path . '.php')) {
            include('pages/website/' . $path . '.php');
        } else {
            NotFound();
        }
    }
}

function views($path, $data = [])
{
    // var_dump($data['blog']->title);
    // die();
    extract($data);
    require('pages/' . $path . '.php');
}
function  view($path, $viewData = ["email" => "bonjours@socapadi.org"])
{
    $data = $viewData;
    if (file_exists('pages/website/' . $path . '.php')) {
        include('pages/website/' . $path . '.php');
    } else {
        NotFound();
    }
}
function htmlView($path)
{
    require('pages/' . $path . '.html');
}
function adminView($path)
{
    require('pages/admin/partials/header.html');
    require('pages/' . $path . '.html');
    require('pages/admin/partials/footer.html');
}
function adminPhpView($path, $data = [])
{
    // var_dump($data['blog']->title);
    // die();
    extract($data);
    require('pages/admin/partials/header.html');
    require('pages/' . $path . '.php');
    require('pages/admin/partials/footer.html');
}
