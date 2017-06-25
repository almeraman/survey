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

        DB::table('questions')->insert([
            'survey_id' => 1,
            'label' => 'Question 1',
            'has_multi' => 0,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 1,
            'label' => 'Question 2',
            'has_multi' => 0,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 1,
            'label' => 'Question 3',
            'has_multi' => 0,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 1,
            'label' => 'Question 4',
            'has_multi' => 1,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 2,
            'label' => 'What do you think about bla 1',
            'has_multi' => 1,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 2,
            'label' => 'What do you think about bla 2',
            'has_multi' => 1,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 2,
            'label' => 'What do you think about bla 3',
            'has_multi' => 1,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 2,
            'label' => 'What do you think about bla 4',
            'has_multi' => 1,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 2,
            'label' => 'Would you buy bla again',
            'has_multi' => 0,
        ]);

        DB::table('questions')->insert([
            'survey_id' => 2,
            'label' => 'How can we improve bla',
            'has_multi' => 0,
        ]);

    }
}
