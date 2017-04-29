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
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 4,
            'label' => 'option 2',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('multi_choices')->insert([
            'question_id' => 4,
            'label' => 'option 3',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
