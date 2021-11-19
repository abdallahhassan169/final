<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{

    protected $table = 'exercises';
    public $timestamps = true;
    protected $fillable = array('title');
    public function training(){
      return $this->belongsToMany('App\Models\models\Training');
    }
}
