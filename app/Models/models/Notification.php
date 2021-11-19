<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'body');
    public function user()
      {
          return $this->belongsTo('App\Models\User');
      }
}
