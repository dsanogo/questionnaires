<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    public function videos()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }

    public function cars()
    {
        return $this->morphedByMany(Car::class, 'taggable');
    }
}
