<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    private $customer;

    public function __construct(Customer $customer) {
        $this->customer = $customer;
    }
    public function index()
    {
        $customers = $this->customer->allCustomers();
        return view('customers.index')->withCustomers($customers);
    }
}
