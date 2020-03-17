<?php

namespace App\Repositories\Interfaces;

interface CustomerRepositoryInterface
{
    /**
     * Get all Customers
     *
     * @return void
     */
    public function allCustomers();

    /**
     * Get One single Customer
     *
     * @param int $customerId
     * @return object
     */
    public function findById($customerId);

    /**
     * Upddate a Customer Record
     *
     * @param int $customerId
     * @param array $customerData
     * @return object
     */
    public function update($customerId, $customerData);
}
