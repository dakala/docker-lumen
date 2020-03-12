<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Classification
 */
class Classification extends Model
{
    protected $table = "classes";
    protected $fillable = array('family_id', 'class_name', 'class_name');
    public $timestamps = false;

}
