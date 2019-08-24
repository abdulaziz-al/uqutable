<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   
  
    protected $fillable = ['class', 'case' , 'doctor_id' , 'group' ,'number', 'time'];

}
