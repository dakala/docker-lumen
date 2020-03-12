<?php

use Illuminate\Database\Seeder;

class FamiliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = PREPARED_CSV_DATA;

        foreach ($items['families'] as $item) {

            $segment = \App\Segment::where([
                'segment' => $item['Segment'],
                'segment_name' => $item['Segment Name'],
            ])->get()->first();


            \App\Family::create([
                'segment_id' => $segment->id,
                'family' => $item['Family'],
                'family_name' => $item['Family Name'],
            ]);
        }
    }
}
