<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    //
    public $table_name = 'course';
    public $fillable = ['course_id', 'course_name',];
}
