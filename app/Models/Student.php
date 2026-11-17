<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public $table_name = 'students';
    public $fillable = ['name', 'email', 'phone', 'address','course','gender','dob','image'];
}
