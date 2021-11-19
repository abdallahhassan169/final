<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{

    protected $table = 'readings';
    public $timestamps = true;
    protected $fillable = array('reading', 'user_id');
    public function user(){
        return $this->belongsTo('App\Models\User');
      }
}
