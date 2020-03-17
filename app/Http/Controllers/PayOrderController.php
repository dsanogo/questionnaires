<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayInterface;
use App\Orders\OrderDetails;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGatewayInterface $paymentGateway)
    {
        // $paymentGateway = new PaymentGateway("usd");
        $order = $orderDetails->all();
        dd($paymentGateway->charge(2500));
    }
}
