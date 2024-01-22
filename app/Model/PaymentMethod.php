<?php

namespace App\Model;

class PaymentMethod extends Model
{


    protected $table_name = 'payment_methods';
    protected $class_name = 'App\Model\PaymentMethod';

    public function payments()
    {
        $paymentInstance = new PaymentMethod();
        if (!is_null($this->id))
            return $paymentInstance->getByOptions(["payment_method_id" => $this->payment_method_id]);
        else
            return NULL;
    }
}
