<?php

namespace App\Orders;

use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayInterface;

class OrderDetails
{
    private $paymentGateway;

    public function __construct(PaymentGatewayInterface $paymentGateway) {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->paymentGateway->setDiscount(500);

        return [
            'name' => 'David',
            'address' => '8 Al Mashtel Street'
        ];
    }
}
