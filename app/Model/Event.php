<?php

namespace App\Model;

class Event extends Model
{


    protected $table_name = 'events';
    protected $class_name = 'App\Model\Event';

    public function show()
    {
        $event = [];
        $event[] = $this;
        $event['managers'] = $this->managers();
        $event['operators'] = $this->operators();
        return $event;
    }
    public function tickets()
    {
        $ticketInstance = new Ticket();
        return $ticketInstance->getByOptions(['event_id' => $this->id]);
    }
    public function ticket_categories()
    {
        $ticketCategoryInstance = new TicketCategory();
        return $ticketCategoryInstance->getByOptions(['event_id' => $this->id]);
    }
    public function managers()
    {
        $userInstance = new User();
        return $userInstance->getByOptions(['event_id' => $this->id, "is_manager" => 1]);
    }
    public function operators()
    {
        $userInstance = new User();
        return $userInstance->getByOptions(['event_id' => $this->id, "is_operator" => 1]);
    }
    public function reservations()
    {
        $reservationInstance = new Reservation();
        return $reservationInstance->getByOptions(['event_id' => $this->id]);
    }
    public function payments()
    {
        $paymentInstance = new Payment();
        return $paymentInstance->getByOptions(['event_id' => $this->id]);
    }
    public function viewed()
    {
        $views = $this->views + 1;
        return $this->save(["views" => $views]);
    }
}
