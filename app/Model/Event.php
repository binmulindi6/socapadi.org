<?php

namespace App\Model;

class Event extends Model
{


    protected $table_name = 'events';
    protected $class_name = 'App\Model\Event';

    public $event_category_id;
    public $title;
    public $description;
    public $organiser;
    public $date;
    public $venue;
    public $venue_id;
    public $email;
    public $contacts;
    public $banner;
    public $start_time;
    public $end_time;
    public $door_open_time;
    public $views;
    public $spots;
    public $is_active;
    public $is_free;
    public $is_reservable;
    public $deleted_at;
    public $created_at;
    public $updated_at;

    //jokers
    public $category;
    public $likes;
    public $ticket_categories;
    public $managers;
    public $operators;

    public function show()
    {
        $event = [];
        $event['event'] = $this;
        $event['category'] = $this->category();
        $event['likes'] = $this->likes();
        $event['ticket_categories'] = $this->ticket_categories();
        return $event;
    }

    public function charge()
    {
        $this->category = $this->category();
        $this->likes = $this->likes();
        $this->ticket_categories = $this->ticket_categories();
        return $this;
    }

    public function chargeAll()
    {
        $this->category = $this->category();
        $this->likes = $this->likes();
        $this->ticket_categories = $this->ticket_categories();
        $this->managers = $this->managers();
        $this->operators = $this->operators();
        return $this;
    }

    public function sponsored()
    {
        return $this->getByOptions(["is_sponsored" => 1]);
    }
    public function next()
    {
        return $this->getByCustomQuery("date >= " . date('Y-m-d') . " and deleted_at is NULL order by date asc");
    }
    public function category()
    {
        $eventcategoryInstance = new EventCategory();
        return $eventcategoryInstance->find($this->event_category_id);
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
        $views = (int)$this->views + 1;
        return $this->save(["views" => $views]);
    }
    public function likes()
    {
        $likeInstance = new Like();
        return count($likeInstance->getByOptions(["event_id" => $this->id]));
    }
}
