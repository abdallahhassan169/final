<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{

    protected $table = 'trainings';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'description');
    public function excercise(){
        return $this->belongsToMany('App\Models\models\Exercise');
      }
}
