<?php

namespace App\Billing;

use Illuminate\Support\Str;

class CreditPaymentGateway implements PaymentGatewayInterface
{
    private $currency;
    private $discount;

    public function __construct($currency) {
        $this->currency = $currency;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }

    public function charge($amount)
    {
        // Charge the bank

        $fees = $amount * 0.03;

        return [
            'amount' => [
                'before' => $amount,
                'after' => ($amount - $this->discount) + $fees
            ],
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fees' => $fees
        ];
    }
}
