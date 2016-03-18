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
            [
                'user_id' => 1,
                'firstname' => 'Florian',
                'surname' => 'Csizmazia',
                'number' => 99,
                'avatar' => 'henry'
            ],
            [
                'user_id' => 2,
                'firstname' => 'David',
                'surname' => 'Schneider',
                'number' => 11,
                'avatar' => 'tevez'
            ],
            [
                'user_id' => 3,
                'firstname' => 'Tim',
                'surname' => 'Hartmann',
                'number' => 3,
                'avatar' => 'alonso'
            ],
            [
                'user_id' => 4,
                'firstname' => 'Bobo',
                'surname' => 'Danek',
                'number' => 1,
                'avatar' => 'de_gea'
            ],
            [
                'user_id' => 5,
                'firstname' => 'Florian',
                'surname' => 'Merkinger',
                'number' => 4,
                'avatar' => 'bale'
            ],
            [
                'user_id' => 6,
                'firstname' => 'Dominik',
                'surname' => 'Theiner',
                'number' => 39,
                'avatar' => 'ramos'
            ],
            [
                'user_id' => 7,
                'firstname' => 'Simon',
                'surname' => 'Steiner',
                'number' => 77,
                'avatar' => 'gerrard'
            ],
            [
                'user_id' => 8,
                'firstname' => 'Laurenz',
                'surname' => 'Berger',
                'number' => 10,
                'avatar' => 'messi'
            ],
            [
                'user_id' => 9,
                'firstname' => 'Philipp',
                'surname' => 'Poindl',
                'number' => 12,
                'avatar' => 'ribery'
            ],
            [
                'user_id' => 10,
                'firstname' => 'Philip',
                'surname' => 'Schuh',
                'number' => 8,
                'avatar' => 'schweinsteiger'
            ],
            [
                'user_id' => 11,
                'firstname' => 'Bernhard',
                'surname' => 'Rath',
                'number' => 9,
                'avatar' => 'ronaldo'
            ],
        ]);
    }
}
