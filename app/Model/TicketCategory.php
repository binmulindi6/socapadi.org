<?php

namespace App\Model;

class TicketCategory extends Model
{


    protected $table_name = 'ticket_categories';
    protected $class_name = 'App\Model\TicketCategory';

    public $type;
    public $price;
    public $currency;
    public $spots;
    public $available;
    public $event_id;
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

    public function tickets()
    {
        $ticketInstance = new Ticket();
        return $ticketInstance->getByOptions(['ticket_category_id' => $this->id]);
    }
    public function assignSpot()
    {
        $available = $this->available;
        $this->save(
            ['available' => $this->available -1]
        );

        return (int)($this->spots + 1) -  (int)($available);
    }
}
