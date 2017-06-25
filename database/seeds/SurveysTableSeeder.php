<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SurveysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('surveys')->insert([
            'company_id' => 1,
            'title' => 'Favorite new flavour',
            'age_range_min' => 16,
            'age_range_max' => 50,
        ]);

        DB::table('surveys')->insert([
            'company_id' => 2,
            'title' => 'Our new own brand',
            'age_range_min' => 30,
            'age_range_max' => 70,
        ]);
    }
}
