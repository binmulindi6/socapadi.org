<?php

namespace App\Model;

use App\Config\Database;

class PersonalToken extends Model
{


    protected $table_name = 'personal_access_tokens';
    protected $class_name = 'App\Model\PersonalToken';

    public $tokenable_type;
    public $tokenable_id;
    public $name;
    public $token;
    public $abilities;
    public $expires_at;
    public $last_used_at;
    public $deleted_at;
    public $created_at;
    public $updated_at;

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
            elseif ($data->expires_at && time() > strtotime($data->expires_at)) return true;
            else return false;
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

    public function getUserLastToken($user)
    {
        $tokens = $this->getByOptions(['tokenable_id' => $user]);
        // var_dump($tokens, $user);
        // die();
        $data =  $tokens ?  array_map(function ($token) {
            if ($token->checkIt()) return $token;
        }, $tokens) : NULL;
        return $data;
    }
}
