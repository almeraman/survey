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
        $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');

        DB::table('surveys')->insert([
            'company_id' => 1,
            'title' => 'Favorite new flavour',
            'age_range_min' => 16,
            'age_range_max' => 50,
            'start_date' => $now,
            'end_date' => Carbon::now()->addMonths(1),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
