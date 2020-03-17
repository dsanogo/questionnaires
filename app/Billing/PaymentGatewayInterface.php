<?php

namespace App\Billing;

interface PaymentGatewayInterface
{
    /**
     * Charge the Customer
     *
     * @param int $amount
     * @return void
     */
    public function charge($amount);

    /**
     * Set a discount to an Order
     *
     * @param int $discount
     * @return void
     */
    public function setDiscount($discount);
}
