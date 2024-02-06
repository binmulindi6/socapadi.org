<?php

namespace App\Model;

class User extends Model
{
    protected $table_name = 'users';
    protected $class_name = 'App\Model\User';


    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $telephone;
    public $email_verified_at;
    public $password;
    public $event_id;
    public $is_admin;
    public $is_manager;
    public $is_operator;
    public $is_active;
    public $avatar;
    public $remember_token;
    public $deleted_at;
    public $created_at;
    public $updated_at;

    public function getInfo()
    {
        if (!is_null($this)) {

            return [
                "id" => $this->id,
                "avatar" => $this->avatar,
                "username" => $this->username,
                "email" => $this->email,
                "first_name" => $this->first_name,
                "last_name" => $this->last_name,
                "telephone" => $this->telephone,
                "is_admin" => $this->is_admin,
                "is_manager" => $this->is_manager,
            ];
        } else {
            return null;
        }
    }

    public function event()
    {
        $eventInstance = new Event();
        return $eventInstance->findByOptions(['id' => $this->event_id]);
    }
    public function tickets()
    {
        $ticketsInstance = new Ticket();
        // return $reservationInstance->getByOptions(['user_id' => $this->id]);
        return array_map(function ($ticktes) {
            return $ticktes->charge();
        }, $ticketsInstance->getByOptions(['user_id' => $this->id]));
    }
    public function reservations()
    {
        $reservationInstance = new Reservation();
        // return $reservationInstance->getByOptions(['user_id' => $this->id]);
        return array_map(function ($reservation) {
            return $reservation->charge();
        }, $reservationInstance->getByOptions(['user_id' => $this->id]));
    }
    public function payments()
    {
        $paymentInstance = new Payment();
        // return $reservationInstance->getByOptions(['user_id' => $this->id]);
        return array_map(function ($payment) {
            return $payment->charge();
        }, $paymentInstance->getByOptions(['user_id' => $this->id]));
    }
    public function notifications()
    {
        $notificationInstance = new Notification();
        return $notificationInstance->getByOptions(['user_id' => $this->id]);
    }
    public function getLastToken()
    {
        $tokenInstance = new PersonalToken();
        return $tokenInstance->getUserLastToken($this->id);
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
    public function isManager()
    {
        if ((int)$this->is_manager === 1)
            return true;
        else
            return false;
    }
    public function isOperator()
    {
        if ((int)$this->is_operator === 1)
            return true;
        else
            return false;
    }

    public function isSimple()
    {
        if (!$this->isAdmin() && !$this->isManager() && !$this->isOperator())
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
