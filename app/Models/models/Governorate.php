<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorate';
    public $timestamps = true;
    protected $fillable = array('name');

}
