<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Blog;

// save mail in DB
class BlogController extends Controller
{

    public static function index()
    {
        // echo 10;
        $items = new Blog();
        return $items->latest();
    }
    public static function latest()
    {
        // echo 10;
        $items = new Blog();
        return $items->latest(3);
    }
    public static function show($request)
    {
        // return [1];
        $item = new Blog();
        $data = $item->find($request['id']);
        return $data;
    }

    public static function store()
    {
        // echo '10101';
        // var_dump($_REQUEST);
        // die();
        if (Request::validate([
            'title',
            'description',
            'category',
            'author',
            'body',
        ]) && isset($_FILES['cover'])) {
            $params = Request::params();
            $instance = new Blog();
            $cover =  $instance->uploadImage('cover', 'blog/');
            if ($cover) {
                $blog = $instance->create(
                    [
                        'title' => str_replace("'", "\'", $params['title']),
                        'description' => str_replace("'", "\'", $params['description']),
                        'category' => str_replace("'", "\'", $params['category']),
                        'author' => str_replace("'", "\'", $params['author']),
                        'body' => str_replace("'", "\'", $params['body']),
                        'cover' => $cover,
                    ]
                );
                if ($blog) {
                    return "success";
                } else {
                    unlink(__DIR__ . '/../../assets/images/' . $cover);
                    // return "oklm";
                    http_response_code(400);
                    return "please check params ";
                }
            } else {
                http_response_code(400);
                return "Image not uploaded ";
            }
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function update()
    {
        // echo '10101';
        // var_dump($_REQUEST);
        // die();
        $params = Request::params();
        $instance = new Blog();
        $blog = $instance->find($params['blog_id']);
        if (
            Request::validate([
                'blog_id',
                'title',
                'description',
                'category',
                'author',
                'body',
            ]) &&
            $blog
        ) {
            // var_dump(($_FILES['cover']));

            if (isset($_FILES['cover']) && strlen($_FILES['cover']['name']) > 0) {
                $cover =  $instance->uploadImage('cover', 'blog/');
                $old = $blog->cover;
                if ($cover) {
                    $blog = $blog->save(
                        [
                            'title' => str_replace("'", "\'", $params['title']),
                            'description' => str_replace("'", "\'", $params['description']),
                            'category' => str_replace("'", "\'", $params['category']),
                            'author' => str_replace("'", "\'", $params['author']),
                            'body' => str_replace("'", "\'", $params['body']),
                            'cover' => $cover,
                        ]
                    );
                    if ($blog) {
                        unlink(__DIR__ . '/../../assets/images/' . $old);
                        return "success";
                    } else {
                        http_response_code(400);
                        return "Blog not uploaded ";
                    }
                } else {
                    http_response_code(400);
                    return "Image not uploaded ";
                }
            } else {
                $blog = $blog->save(
                    [
                        'title' => str_replace("'", "\'", $params['title']),
                        'description' => str_replace("'", "\'", $params['description']),
                        'category' => str_replace("'", "\'", $params['category']),
                        'author' => str_replace("'", "\'", $params['author']),
                        'body' => str_replace("'", "\'", $params['body']),
                    ]
                );

                if ($blog) {
                    return "success";
                } else {
                    http_response_code(400);
                    return "Blog not uploaded ";
                }
            }
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    // public static function store()
    // {
    //     $params = Request::params();
    //     $instance = new Blog();
    //     $self = $instance->find($params['Blog_id']);

    //     if ($self) {

    //         if (Request::validate([
    //             'first_name',
    //             'Blogname',
    //             'email',
    //             'telephone',
    //             // 'password',
    //             // 'event_id',
    //         ])) {
    //             // $mail = new Mail();
    //             if ($self->Blogname !== $params['Blogname']) {
    //                 if ($instance->checkBlogname($params["Blogname"])) {
    //                     http_response_code(400);
    //                     return "Blogname already exists";
    //                 }
    //             }
    //             if ($self->email !== $params['email']) {
    //                 if ($instance->checkEmail($params["email"])) {
    //                     http_response_code(400);
    //                     return "Email already taken";
    //                 }
    //             }
    //             if ($self->telephone !== $params['telephone']) {
    //                 if ($instance->checkPhone($params["telephone"])) {
    //                     http_response_code(400);
    //                     return "Phone Number already taken";
    //                 }
    //             }
    //             $Blog = $self->save(
    //                 [
    //                     'names' => $params["names"],
    //                     'Blogname' => $params["Blogname"],
    //                     'email' => $params["email"],
    //                     'telephone' => $params["telephone"],
    //                 ]
    //             );

    //             return "success";
    //         } else {
    //             // return "oklm";
    //             http_response_code(400);
    //             return "please check params ";
    //         }
    //     } else {
    //         // return "oklm";
    //         http_response_code(400);
    //         return "please check params ";
    //     }
    // }

    public static function destroy()
    {
        $params = Request::params();
        if (Request::validate([
            'blog_id'
        ])) {

            $instance = new Blog();
            $item = $instance->find($params['blog_id']);
            if ($item) {
                $item->delete();
                return "success";
            } else {
                http_response_code(404);
                return "element not found";
            }
        } else {
            http_response_code(400);
            return "please check params";
        }
    }
}
