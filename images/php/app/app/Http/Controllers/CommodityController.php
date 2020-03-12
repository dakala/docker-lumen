<?php

namespace App\Http\Controllers;

use DB;

class CommodityController extends Controller
{
    const MODEL = "App\Commodity";

    use RestfulActions;

    /**
     * Get commodities by class id.
     *
     * @param int $classId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function commoditiesByClassId($classId)
    {
        $query = DB::table('commodities')
            ->select('commodities.id', 'segment', 'segment_name', 'family', 'family_name', 'class', 'class_name', 'commodity', 'commodity_name')
            ->join('classes', 'commodities.class_id', '=', 'classes.id')
            ->join('families', 'classes.family_id', '=', 'families.id')
            ->join('segments', 'families.segment_id', '=', 'segments.id');

        $query->where('commodities.class_id', '=', $classId);

        return $this->output('done', $query->get());
    }

    /**
     * Get commodities by family and class id.
     *
     * @param int $familyId
     * @param int $classId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function commoditiesByFamilyIdAndClassId($familyId, $classId)
    {
        $query = DB::table('commodities')
            ->select('commodities.id', 'segment', 'segment_name', 'family', 'family_name', 'class', 'class_name', 'commodity', 'commodity_name')
            ->join('classes', 'commodities.class_id', '=', 'classes.id')
            ->join('families', 'classes.family_id', '=', 'families.id')
            ->join('segments', 'families.segment_id', '=', 'segments.id');

        $query->where('commodities.class_id', '=', $classId);
        $query->where('classes.family_id', '=', $familyId);

        return $this->output('done', $query->get());
    }

}
