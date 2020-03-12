<?php

use Illuminate\Database\Seeder;

class CommoditiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = PREPARED_CSV_DATA;

        foreach ($items['commodities'] as $item) {

            $segment = \App\Segment::where([
                'segment' => $item['Segment'],
                'segment_name' => $item['Segment Name'],
            ])->get()->first();

            $family = \App\Family::where([
                'segment_id' => $segment->id,
                'family' => $item['Family'],
                'family_name' => $item['Family Name'],
            ])->get()->first();

            $classification = \App\Classification::where([
                'family_id' => $family->id,
                'class' => $item['Class'],
                'class_name' => $item['Class Name'],
            ])->get()->first();

            // Create Commodity
            \App\Commodity::create([
                'class_id' => $classification->id,
                'commodity' => $item['Commodity'],
                'commodity_name' => $item['Commodity Name'],
            ]);
        }
    }
}
