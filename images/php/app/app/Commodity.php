<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Commodity
 */
class Commodity extends Model
{
    protected $table = "commodities";
    protected $fillable = array('class_id', 'commodity', 'commodity_name');
    public $timestamps = false;

}
