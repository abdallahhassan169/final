<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{

    protected $table = 'meals';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'description', 'image');
public function diets(){
  return $this->belongsToMany('App\Models\models\Diet');
}
}
