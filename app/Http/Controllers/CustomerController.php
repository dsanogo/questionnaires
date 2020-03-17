<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository) {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers = $this->customerRepository->allCustomers();
        return view('customers.index')->withCustomers($customers);
    }

    public function show($customerId)
    {
        $customer = $this->customerRepository->findById($customerId);
        return view('customers.show')->withCustomer($customer);
    }

    public function update($customerId)
    {
        $updated = $this->customerRepository->update($customerId, []);

        dd($updated);
    }
}
