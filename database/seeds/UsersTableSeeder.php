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
        $now = \Carbon\Carbon::now()->format('Y-m-d H:i:s');

        DB::table('users')->insert([
            'name' => 'david',
            'email' => 'david.alan.oneill@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
