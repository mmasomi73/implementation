<?php namespace App\Repositories;


use App\Payment;

class PaymentRepository
{
    protected $conditions = [];

    public static function sum ($conditions = [])
    {
        $payment = new Payment();

        foreach ( $conditions as $key => $value )
            $payment = $payment->where($key, $value);

        $payment = $payment->sum('price');

        return $payment ? $payment : 0;

    }

}