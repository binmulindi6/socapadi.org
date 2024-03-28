<?php

namespace App\Model;

use App\Config\Database;

class PersonalToken extends Model
{


    protected $table_name = 'personal_access_tokens';
    protected $class_name = 'App\Model\PersonalToken';

    public $tokenable_id;
    public $name;
    public $token;
    public $abilities;
    public $expires_at;
    public $last_used_at;

    public function generate($user, $ability = 'simple', $name = 'Auth')
    {
        $str = random_bytes(5);
        $randomNumber = mt_rand(1111, 9999);
        $d = strtotime("+3 hours");
        $date = date("Y-m-d H:i", $d);
        return $this->create([
            "tokenable_id" => $user,
            "name" => $name,
            "expires_at" => $date,
            "abilities" => $ability,
            "token" => base64_encode(bin2hex($randomNumber . $str)),
        ]);
    }


    public function checkIt($abilities = null)
    {
        // TODO: Implement check() method.
        $data = $this;
        if ($abilities) {
            // if (empty($token)) return false;
            if (!$data) return false;
            elseif (is_null($data->expires_at) && in_array($data->abilities, $abilities)) return true;
            elseif ($data->expires_at && time() > strtotime($data->expires_at) && in_array($data->abilities, $abilities)) return true;
            else return false;
        } else {
            // if (empty($token)) return false;
            // $data = $this->findByOptions(["token" => $token]);
            if (!$data) return false;
            elseif (is_null($data->expires_at)) return true;
            elseif ($data->expires_at && time() > strtotime($data->expires_at)) return false;
            else return true;
        }
    }
    public function check($token, $abilities = null)
    {
        // TODO: Implement check() method.

        if ($abilities) {
            if (empty($token)) return false;
            $data = $this->findByOptions(["token" => $token]);
            if (!$data) return false;
            elseif (is_null($data->expires_at) && in_array($data->abilities, $abilities)) return true;
            elseif ($data->expires_at && time() < strtotime($data->expires_at) && in_array($data->abilities, $abilities)) return true;
            else return false;
        } else {
            if (empty($token)) return false;
            $data = $this->findByOptions(["token" => $token]);
            // var_dump(time());
            // var_dump(strtotime($data->expires_at));
            if (!$data) return false;
            elseif ($data->expires_at && time() > strtotime($data->expires_at)) return false;
            else return true;
        }
    }

    public function user()
    {
        // TODO: Implement check() method.
        $userInstance = new User();
        if (empty($this->tokenable_id)) return NULL;
        $data = $userInstance->find($this->tokenable_id);
        if (!$data) return NULL;
        else return $data;
    }

    public function getUserLastToken($user, $ability)
    {
        $tokens = $this->getByOptions(['tokenable_id' => $user, "abilities" => $ability]);
        // var_dump($tokens, $user);
        // die();
        $data =  $tokens ?  array_map(function ($token) {
            if ($token->checkIt()) return $token;
        }, $tokens) : NULL;
        return $data;
    }
}
