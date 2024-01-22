<?php

namespace App\Model;

use App\Config\Database;

class PersonalToken extends Model
{


    protected $table_name = 'personal_access_tokens';
    protected $class_name = 'App\Model\PersonalToken';

    public function generate($user, $ability = 'simple', $name = 'Auth', $type = "authetication_token")
    {
        $str = random_bytes(5);
        $randomNumber = mt_rand(1111, 9999);
        return $this->create([
            "tokenable_type" => $type,
            "tokenable_id" => $user,
            "name" => $name,
            "abilities" => $ability,
            "token" => base64_encode(bin2hex($randomNumber . $str)),
        ]);
    }


    public function check($token, $abilities = null)
    {
        // TODO: Implement check() method.
        if ($abilities) {
            if (empty($token)) return false;
            $data = $this->findByOptions(["token" => $token]);
            if (!$data) return false;
            elseif (is_null($data->expires_at) && in_array($data->abilities, $abilities)) return true;
            elseif ($data->expires_at && time() > strtotime($data->expires_at) && in_array($data->abilities, $abilities)) return true;
            else return false;
        } else {
            if (empty($token)) return false;
            $data = $this->findByOptions(["token" => $token]);
            if (!$data) return false;
            elseif (is_null($data->expires_at)) return true;
            elseif ($data->expires_at && time() > strtotime($data->expires_at)) return true;
            else return false;
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
}
