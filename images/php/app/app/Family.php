<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Family
 */
class Family extends Model
{

    protected $table = "families";
    protected $fillable = array('segment_id', 'family', 'family_name');
    public $timestamps = false;

}
