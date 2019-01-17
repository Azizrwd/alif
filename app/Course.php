<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title'
    ];

    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
}
