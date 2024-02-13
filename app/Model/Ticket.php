<?php

namespace App\Model;

class Ticket extends Model
{

    protected $table_name = 'tickets';
    protected $class_name = 'App\Model\Ticket';

    public $code;
    public $name_holder;
    public $event_id;
    public $ticket_category_id;
    public $ticket_category;
    public $user_id;
    public $licence;
    public $spot;
    public $printed;
    public $activated;
    public $verified;
    public $activated_at;
    public $verified_at;
    public $activated_by;
    public $verified_by;
    public $generated_by;
    public $event;
    public $payment;
    public $reservation;
    public $deleted_at;
    public $created_at;
    public $updated_at;

    public function event()
    {
        $eventInstance = new Event();
        if (!is_null($this->event_id))
            return $eventInstance->find($this->event_id);
        else
            return NULL;
    }
    public function payment()
    {
        $paymentInstance = new Payment();
        if (!is_null($this->id))
            return $paymentInstance->findByOptions(["ticket_id", $this->id]);
        else
            return NULL;
    }
    public function ticket_category()
    {
        $ticketCategoryInstance = new TicketCategory();
        if (!is_null($this->id))
            return $ticketCategoryInstance->find($this->ticket_category_id);
        else
            return NULL;
    }
    public function reservation()
    {
        $reservationInstance = new Reservation();
        if (!is_null($this->id))
            return $reservationInstance->findByOptions(["ticket_id", $this->id]);
        else
            return NULL;
    }

    public function charge()
    {
        $this->payment = $this->payment();
        $this->event = $this->event();
        $this->reservation = $this->reservation();
        $this->ticket_category = $this->ticket_category();
        return $this;
    }
}
