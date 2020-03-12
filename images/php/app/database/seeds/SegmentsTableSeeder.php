<?php

use Illuminate\Database\Seeder;

class SegmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = PREPARED_CSV_DATA;

        foreach ($items['segments'] as $item) {
            \App\Segment::create([
                'segment' => $item['Segment'],
                'segment_name' => $item['Segment Name'],
            ]);
        }
    }
}
