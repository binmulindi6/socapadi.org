<?php

namespace App\Model;

class PaymentMethod extends Model
{


   protected $table_name = 'payment_methods';
    protected $class_name = 'App\Model\PaymentMethod';
    
    public $event_id;
    public $name;
    public $number;
    public $cover;
    public $deleted_at;
    public $created_at;
    public $updated_at;

    public function payments()
    {
        $paymentInstance = new Payment();
        if (!is_null($this->id))
            return $paymentInstance->getByOptions(["payment_method_id" => $this->id]);
        else
            return NULL;
    }
}
