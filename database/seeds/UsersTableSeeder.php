<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'david',
            'email' => 'david.alan.oneill@gmail.com',
            'password' => bcrypt('password'),
            'age' => '35',
        ]);
    }
}
