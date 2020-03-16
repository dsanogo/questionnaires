<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    protected $guarded = [];

    public function path()
    {
        return route('questionnaires.show', $this->id);
    }
    
    public function publicPath()
    {
        return route('surveys.take', [$this->id, Str::slug($this->title)]);
    }

    public function deletePath()
    {
        return route('questionnaires.destroy', $this->id);
    }

    public function store($questionnaire)
    {
        return $this->create($questionnaire);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updateQ($id, $questionnaire)
    {
        return $this->findOrFail($id)->update($questionnaire);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }
}
