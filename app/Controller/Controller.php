<?php

namespace App\Controller;

class Controller
{
    public static function getMEssages()
    {
        // echo 10;
        return [
            'message1',
            'message2'
        ];
    }
    public static function sendMessage()
    {
        if ($_POST['message']) {
            return $_POST['message'];
        } else {
            return 'error on params';
        }
    }
}
