<?php

namespace App\Model;

class Reservation extends Model
{


    protected $table_name = 'reservations';
    protected $class_name = 'App\Model\Reservation';

    public function ticket()
    {
        $ticketInstance = new Ticket();
        if (!is_null($this->ticket_id))
            return $ticketInstance->find($this->ticket_id);
        else
            return NULL;
    }
    public function event()
    {
        $eventInstance = new Event();
        if (!is_null($this->event_id))
            return $eventInstance->find($this->event_id);
        else
            return NULL;
    }
}
