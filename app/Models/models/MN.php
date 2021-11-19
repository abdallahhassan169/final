<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

class MN extends Model 
{

    protected $table = 'diet_meal';
    public $timestamps = true;
    protected $fillable = array('meal_id', 'diet_id');

}