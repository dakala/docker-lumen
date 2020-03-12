<?php

namespace App\Http\Controllers;

use DB;

class FamilyController extends Controller
{
    const MODEL = "App\Family";

    use RestfulActions;


    public function familiesBySegmentId($segmentId)
    {
        $query = DB::table('families')
            ->select('families.id', 'families.segment_id', 'segment', 'segment_name', 'family', 'family_name')
            ->join('segments', 'families.segment_id', '=', 'segments.id');

        $query->where('families.segment_id', '=', $segmentId);

        return $this->output('done', $query->get());

    }
}
