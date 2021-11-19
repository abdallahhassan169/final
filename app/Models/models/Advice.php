<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{

    protected $table = 'advices';
    public $timestamps = true;
    protected $fillable = array('title', 'description');

}
