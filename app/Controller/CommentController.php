<?php

namespace App\Controller;

use App\Http\Request;
use App\Model\Comment;

// save mail in DB
class CommentController extends Controller
{

    public static function index()
    {
        $items = new Comment();
        return $items->all();
    }
    public static function show($request)
    {
        // return [1];
        $item = new Comment();
        return $item->find($request['id']);
    }

    public static function store()
    {
        if (Request::validate([
            'text',
            'user_id',
        ])) {
            $params = Request::params();
            $instance = new Comment();
            // $mail = new Mail();
            $item =  $instance->create(
                [
                    'text' => $params["text"],
                    'user_id' => $params["user_id"],
                    'created_at' => date('Y-m-d h:i'),
                ]
            );

            // return $created->send();
            return "success";
        } else {
            // return "oklm";
            http_response_code(400);
            return "please check params ";
        }
    }
    public static function search()
    {
        $items = new Comment();
        return $items->all();
    }
    public static function destroy($request)
    {
        $item = new Comment();
        $item->delete();
        return "succes";
    }
}
