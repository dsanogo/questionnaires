<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function deletePath()
    {
        return route('questions.destroy', $this->id);
    }

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
