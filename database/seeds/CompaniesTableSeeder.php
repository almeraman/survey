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

        DB::table('companies')->insert([
            'name' => 'Coke A Cola',
            'address' => 'Dublin',
        ]);

        DB::table('companies')->insert([
            'name' => 'Tesco',
            'address' => 'Dublin 1',
        ]);
    }
}
