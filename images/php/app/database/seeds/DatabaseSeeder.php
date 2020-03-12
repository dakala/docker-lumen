<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        define('PREPARED_CSV_DATA', $this->prepareData());

        $this->call([
            SegmentsTableSeeder::class,
            FamiliesTableSeeder::class,
            ClassesTableSeeder::class,
            CommoditiesTableSeeder::class
        ]);
    }

    public function prepareData()
    {
        $filepath = './database/seeds/data.csv';
        $items = $this->ArrayFromCsv($filepath);

        $segments = $families = $classes = [];
        foreach ($items as $item) {

            $segments[] =  [
                'Segment' => $item['Segment'],
                'Segment Name' => $item['Segment Name'],
            ];

            $families[] = [
                'Segment' => $item['Segment'],
                'Segment Name' => $item['Segment Name'],
                'Family' => $item['Family'],
                'Family Name' => $item['Family Name'],
            ];

            $classes[] = [
                'Segment' => $item['Segment'],
                'Segment Name' => $item['Segment Name'],
                'Family' => $item['Family'],
                'Family Name' => $item['Family Name'],
                'Class' => $item['Class'],
                'Class Name' => $item['Class Name'],
            ];
        }

        return [
            'segments' => array_values(array_unique($segments, SORT_REGULAR)),
            'families' => array_values(array_unique($families, SORT_REGULAR)),
            'classes' => array_values(array_unique($classes, SORT_REGULAR)),
            'commodities' => $items,
        ];
    }

    public function ArrayFromCsv($filepath)
    {
        $data = (file_exists($filepath)) ? array_map('str_getcsv', file($filepath)) : [];
        $header = array_shift($data);

        array_walk($data, [$this, 'combineArray'], $header);

        return $data;
    }

    public function combineArray(&$row, $key, $header) {
        $row = array_combine($header, $row);
    }
}
