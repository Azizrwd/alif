<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'date_of_birth', 'phone', 'address', 'email'
    ];

    public function course()
    {
        return $this->belongsToMany(Course::class);
    }
}
