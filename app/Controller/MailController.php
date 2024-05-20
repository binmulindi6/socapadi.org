<?php

namespace App\Controller;

use App\Config\MailConfig;
use App\Model\Mail;
use App\Http\Request;


// save mail in DB
class MailController extends Controller
{

    public static function getMail($id)
    {
        $mails = new Mail();
        return $mails->find($id);
    }
    public static function getMails()
    {
        $mails = new Mail();
        return $mails->all();
    }

    public static function store()
    {
        // var_dump(new Mail());
        if (Request::validate([
            'sender',
            // 'recever',
            'subject',
            'message',
            'name',
            'telephone',
        ])) {
            $params = Request::params();
            $mail = new Mail();
            // $mail = new Mail();
            $created =  $mail->create(
                [
                    'sender' => $params['sender'],
                    'recever' => MailConfig::$contact_email,
                    'subject' => $params['subject'],
                    'message' => $params['message'],
                    'sender_name' => $params['name'],
                    'sender_telephone' => $params['telephone'],
                ]
            );

            // return 'success';
            return $created->send();
            // return 'success';
        } else {
            // return "oklm";
            return "check params " . http_response_code(400);
        }
    }
    public static function register()
    {
        // var_dump(new Mail());
        if (Request::validate([
            'sender',
            // 'recever',
            // 'subject',
            // 'message',
            // 'name',
            // 'telephone',
        ])) {
            $params = Request::params();
            $mail = new Mail();
            // $mail = new Mail();
            $created =  $mail->create(
                [
                    'sender' => $params['sender'],
                    'recever' => MailConfig::$contact_email,
                    'subject' => $params['subject'],
                    'message' => $params['message'],
                    'sender_name' => $params['name'],
                    'sender_telephone' => $params['telephone'],
                ]
            );

            // return 'success';
            return $created->send();
            // return 'success';
        } else {
            // return "oklm";
            return "check params " . http_response_code(400);
        }
    }
}
