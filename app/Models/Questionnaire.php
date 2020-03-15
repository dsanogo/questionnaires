<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded = [];

    public function store($questionnaire)
    {
        return $this->create($questionnaire);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
