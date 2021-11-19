<?php

namespace models;

use Illuminate\Database\Eloquent\Model;

class Ex extends Model 
{

    protected $table = 'exercise_training';
    public $timestamps = true;
    protected $fillable = array('exercise_id', 'training_id');

}