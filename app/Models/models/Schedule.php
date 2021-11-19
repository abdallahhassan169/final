<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

    protected $table = 'schedules';
    public $timestamps = true;
    protected $fillable = array('user_id', 'medicine', 'time', 'is_on');
    public function user()
    {
      return $this->belongsTo('App\Models\models\Schedule');
    }
}
