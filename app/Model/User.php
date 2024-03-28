<?php

namespace App\Model;

class User extends Model
{
    protected $table_name = 'users';
    protected $class_name = 'App\Model\User';


    public $names;
    public $email;
    public $telephone;
    public $email_verified_at;
    public $password;
    public $is_admin;
    public $is_active;
    public $avatar;
    public $remember_token;
    public $email_verification_code;
    public $purchases;
    public $sellings;
    public $swaps;


    public function getInfo()
    {
        if (!is_null($this)) {

            $this->purchases = $this->purchases();
            $this->sellings = $this->sellings();
            $this->swaps = $this->swaps();
            return $this;
        } else {
            return null;
        }
    }

    ///crypto
    public function purchases()
    {
        $instance = new Purchase();
        return $instance->getByOptions(['user_id' => $this->id]);
    }
    public function sellings()
    {
        $instance = new Selling();
        return $instance->getByOptions(['user_id' => $this->id]);
    }
    public function swaps()
    {
        $instance = new Swap();
        return $instance->getByOptions(['user_id' => $this->id]);
    }
    public function notifications()
    {
        $notificationInstance = new Notificatoin();
        return $notificationInstance->getByOptions(['user_id' => $this->id]);
    }
    public function getLastToken()
    {
        $tokenInstance = new PersonalToken();
        $ability = $this->isAdmin() ? 'admin' : 'simple';
        return $tokenInstance->getUserLastToken($this->id, $ability);
    }

    public function changeStatus()
    {
        return $this->save([
            'is_active' => $this->is_active == 1 ? 0 : 1,
            'updated_at' => date('Y-m-d h:i')
        ]);
    }
    public function makeAdmin()
    {
        return $this->save([
            'is_admin' => 1,
            'updated_at' => date('Y-m-d h:i')
        ]);
    }

    public function isAdmin()
    {
        if ((int)$this->is_admin === 1)
            return true;
        else
            return false;
    }

    public function isSimple()
    {
        if (!$this->isAdmin())
            return true;
        else
            return false;
    }
    public function checkUsername($username)
    {
        return $this->findByOptions(['username' => $username]);
    }
    public function checkEmail($username)
    {
        return $this->findByOptions(['email' => $username]);
    }
    public function checkPhone($username)
    {
        return $this->findByOptions(['telephone' => $username]);
    }
}
