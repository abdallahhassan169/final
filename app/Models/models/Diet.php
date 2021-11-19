<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diet extends Model
{

    protected $table = 'diets';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('cluster_id');
    public function meals(){
      return $this->belongsToMany('App\Models\models\Meal');
    }
}
