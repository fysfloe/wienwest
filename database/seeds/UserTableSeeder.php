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
            [
                'name' => 'floe',
                'email' => 'florian.csizmazia@gmail.com',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'dave',
                'email' => 'dave@wienwest.at',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'tim',
                'email' => 'tim@wienwest.at',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'bobo',
                'email' => 'bobo@wienwest.at',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'merki',
                'email' => 'merki@wienwest.at',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'dominik',
                'email' => 'dominik@wienwest.at',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'max',
                'email' => 'max@wienwest.at',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'laurenz',
                'email' => 'laurenz@wienwest.at',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'poindl',
                'email' => 'poindl@wienwest.at',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'schuh',
                'email' => 'schuh@wienwest.at',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'berni',
                'email' => 'berni@wienwest.at',
                'password' => bcrypt('admin'),
            ]
        ]);
    }
}
