<?php

namespace App\Model;

class User extends Model
{
    protected $table_name = 'users';
    protected $class_name = 'App\Model\User';


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
}
