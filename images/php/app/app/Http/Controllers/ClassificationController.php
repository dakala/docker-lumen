<?php

namespace App\Http\Controllers;

use DB;

class ClassificationController extends Controller
{
    const MODEL = "App\Segment";

    use RestfulActions;

    public function classesByFamilyId($familyId)
    {
        $query = DB::table('classes')
            ->select('classes.id', 'segment', 'segment_name', 'family', 'family_name', 'class', 'class_name')
            ->join('families', 'classes.family_id', '=', 'families.id')
            ->join('segments', 'families.segment_id', '=', 'segments.id');

        $query->where('classes.family_id', '=', $familyId);


        return $this->output('done', $query->get());

    }
}
