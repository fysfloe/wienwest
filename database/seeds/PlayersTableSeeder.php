<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            'user_id' => 1,
            'firstname' => 'Florian',
            'surname' => 'Csizmazia',
            'number' => 99,
            'fav_position' => 'Waß i ned.',
            'fav_soft_toy' => 'Karottenmann',
            'avatar' => 'henry'
        ]);
        DB::table('players')->insert([
            'user_id' => 2,
            'firstname' => 'David',
            'surname' => 'Schneider',
            'number' => 11,
            'fav_position' => 'Stürmer',
            'avatar' => 'van_persie'
        ]);
    }
}
