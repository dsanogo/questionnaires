<?php

namespace App\Models;

use App\QueryFilters\Active;
use App\QueryFilters\MaxCount;
use App\QueryFilters\Sort;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Customer extends Model
{
    public function showPath()
    {
        return route('customers.show', $this->id);
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function format()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_by' => $this->user->email,
            'last_updated' => $this->updated_at->diffForHumans()
        ];
    }
}
