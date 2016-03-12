<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'floe',
            'email' => 'florian.csizmazia@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        DB::table('users')->insert([
            'name' => 'dave',
            'email' => 'dave@wienwest.at',
            'password' => bcrypt('admin'),
        ]);
    }
}
