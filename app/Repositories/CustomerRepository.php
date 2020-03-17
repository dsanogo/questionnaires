<?php

namespace App\Repositories;

use App\Models\Customer;
use App\QueryFilters\Active;
use App\QueryFilters\MaxCount;
use App\QueryFilters\Sort;
use App\Repositories\Interfaces\CustomerRepositoryInterface;
use Illuminate\Pipeline\Pipeline;

class CustomerRepository implements CustomerRepositoryInterface
{
    private $customer;
    
    public function __construct(Customer $customer) {
        $this->customer = $customer;
    }

    public function allCustomers()
    {
        return app(Pipeline::class)
            ->send(Customer::query())
                ->through([
                    Active::class,
                    Sort::class,
                    MaxCount::class
                ])
                ->thenReturn()
                    ->with('user')
                        ->paginate(15);
    }

    public function findById($customerId)
    {
        return $this->customer->where('id', $customerId)->where('active', 1)->with('user')->firstOrFail();    
    }

    public function update($customerId, $customerData)
    {
        return $this->customer->findOrFail($customerId)->update($customerData);
    }
}
