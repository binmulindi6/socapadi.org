<?php

namespace App\Model;

class Reservation extends Model
{


    protected $table_name = 'reservations';
    protected $class_name = 'App\Model\Reservation';

    public $code;
    public $name_holder;
    public $user_id;
    public $event;
    public $event_id;
    public $ticket_id;
    public $ticket;
    public $ticket_category_id;
    public $ticket_category;
    public $spot;
    public $verified;
    public $approved;
    public $approved_at;
    public $verified_at;
    public $approved_by;
    public $verified_by;
    public $deleted_at;
    public $created_at;
    public $updated_at;

    public function ticket()
    {
        $ticketInstance = new Ticket();
        if (!is_null($this->ticket_id))
            return $ticketInstance->find($this->ticket_id);
        else
            return NULL;
    }
    public function ticket_category()
    {
        $ticketInstance = new TicketCategory();
        if (!is_null($this->ticket_category_id))
            return $ticketInstance->find($this->ticket_category_id);
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

    public function charge()
    {
        $unserInstance = new User();
        $this->ticket = $this->ticket();
        $this->event = $this->event();
        $this->ticket_category = $this->ticket_category();
        $this->approved_by = isset($this->approved_by) ? $unserInstance->find($this->approved_by) : null;
        $this->verified_by = isset($this->verified_by) ? $unserInstance->find($this->verified_by) : null;
        return $this;
    }
}
