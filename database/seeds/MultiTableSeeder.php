<?php

use Illuminate\Database\Seeder;

class MultiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');

        DB::table('multi_choices')->insert([
            'question_id' => 4,
            'label' => 'option 1',
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 4,
            'label' => 'option 2',
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 4,
            'label' => 'option 3',
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 5,
            'label' => 'Yes',
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 5,
            'label' => 'No',
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 6,
            'label' => 'Yes',
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 6,
            'label' => 'No',
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 7,
            'label' => 'Yes',
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 7,
            'label' => 'No',
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 8,
            'label' => 'Yes',
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 8,
            'label' => 'No',
        ]);
    }
}
