<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Segment
 */
class Segment extends Model
{
    protected $fillable = array('segment', 'segment_name');
    public $timestamps = false;

}
