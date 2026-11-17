<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rolemodel extends Model
{
    //
    public $table_name = 'roles';
    public $fillable = ['role_id','role_name'];
}
