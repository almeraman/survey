<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');

        DB::table('companies')->insert([
            'name' => 'Coke A Cola',
            'address' => 'Dublin',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
