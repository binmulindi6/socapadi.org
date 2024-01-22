<?php

namespace App\Model;

class TicketCategory extends Model
{


    protected $table_name = 'ticket_categories';
    protected $class_name = 'App\Model\TicketCategory';

    public function event()
    {
        $eventInstance = new Event();
        if (!is_null($this->event_id))
            return $eventInstance->find($this->event_id);
        else
            return NULL;
    }

    public function tickets()
    {
        $ticketInstance = new Ticket();
        return $ticketInstance->getByOptions(['ticket_category_id' => $this->id]);
    }
}
