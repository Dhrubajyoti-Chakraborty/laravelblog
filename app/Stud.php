<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stud extends Model
{
    protected $table = 'studs';
    protected $fillable = ['fname','lname','course','section'];
}
