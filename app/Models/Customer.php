<?php

namespace App\Models;

use App\QueryFilters\Active;
use App\QueryFilters\MaxCount;
use App\QueryFilters\Sort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Customer extends Model
{
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
                ->paginate(15);
    }
}
