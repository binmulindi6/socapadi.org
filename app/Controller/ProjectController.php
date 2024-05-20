<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Project;

// save mail in DB
class ProjectController extends Controller
{

    public static function index()
    {
        // echo 10;
        $items = new Project();
        return $items->latest();
    }
    public static function latest()
    {
        // echo 10;
        $items = new Project();
        return $items->latest(3);
    }
    public static function show($request)
    {
        // return [1];
        $item = new Project();
        $data = $item->find($request['id']);
        return $data;
    }

    public static function store()
    {
        // echo '10101';
        // var_dump($_REQUEST);
        // die();
        if (Request::validate([
            'name',
            'debut',
            'fin',
            'partenaire',
            'body',
            'state',
        ]) && isset($_FILES['cover'])) {
            $params = Request::params();
            $instance = new Project();
            $cover =  $instance->uploadImage('cover', 'projects/');
            if ($cover) {
                $project = $instance->create(
                    [
                        'name' => str_replace("'", "\'", $params['name']),
                        'partenaire' => str_replace("'", "\'", $params['partenaire']),
                        'body' => str_replace("'", "\'", $params['body']),
                        'state' => $params['state'],
                        'debut' => $params['debut'],
                        'fin' => isset($params['fin']) && strlen($params['fin']) > 4  ? $params['fin'] : NULL,
                        'cover' => $cover,
                    ]
                );
                if ($project) {
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
        $instance = new Project();
        $project = $instance->find($params['project_id']);
        if (
            Request::validate([
                'project_id',
                'name',
                'debut',
                'fin',
                'partenaire',
                'body',
                'state',
            ]) &&
            $project
        ) {
            // var_dump(($_FILES['cover']));

            if (isset($_FILES['cover']) && strlen($_FILES['cover']['name']) > 0) {
                $cover =  $instance->uploadImage('cover', 'projects/');
                $old = $project->cover;
                if ($cover) {
                    $project = $project->save(
                        [
                            'name' => str_replace("'", "\'", $params['name']),
                            'partenaire' => str_replace("'", "\'", $params['partenaire']),
                            'body' => str_replace("'", "\'", $params['body']),
                            'state' => $params['state'],
                            'debut' => $params['debut'],
                            'fin' => isset($params['fin']) ? $params['fin'] : NULL,
                            'cover' => $cover,
                        ]
                    );
                    if ($project) {
                        unlink(__DIR__ . '/../../assets/images/' . $old);
                        return "success";
                    } else {
                        http_response_code(400);
                        return "project not uploaded ";
                    }
                } else {
                    http_response_code(400);
                    return "Image not uploaded ";
                }
            } else {
                $project = $project->save(
                    [
                        'name' => str_replace("'", "\'", $params['name']),
                        'partenaire' => str_replace("'", "\'", $params['partenaire']),
                        'body' => str_replace("'", "\'", $params['body']),
                        'state' => $params['state'],
                        'debut' => $params['debut'],
                        'fin' => isset($params['fin']) && strlen($params['fin']) > 4 ? $params['fin'] : NULL,
                    ]
                );

                if ($project) {
                    return "success";
                } else {
                    http_response_code(400);
                    return "project not uploaded ";
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
    //     $instance = new Project();
    //     $self = $instance->find($params['project_id']);

    //     if ($self) {

    //         if (Request::validate([
    //             'first_name',
    //             'projectname',
    //             'email',
    //             'telephone',
    //             // 'password',
    //             // 'event_id',
    //         ])) {
    //             // $mail = new Mail();
    //             if ($self->Projectname !== $params['projectname']) {
    //                 if ($instance->checkProjectname($params["projectname"])) {
    //                     http_response_code(400);
    //                     return "projectname already exists";
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
    //             $project = $self->save(
    //                 [
    //                     'names' => $params["names"],
    //                     'projectname' => $params["projectname"],
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
            'project_id'
        ])) {

            $instance = new Project();
            $item = $instance->find($params['project_id']);
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
