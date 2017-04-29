<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');

        DB::table('questions')->insert([
            'survey_id' => 1,
            'label' => 'Question 1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 1,
            'label' => 'Question 2',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 1,
            'label' => 'Question 3',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 1,
            'label' => 'Question 4',
            'multi_id' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
