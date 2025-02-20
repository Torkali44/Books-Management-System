<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'phone'];

    public function book()
    {
        return $this->hasMany(Student::class, 'student_id');
    }
}
