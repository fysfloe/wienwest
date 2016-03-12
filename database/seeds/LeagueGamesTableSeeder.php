<?php

use Illuminate\Database\Seeder;

class LeagueGamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('league_games')->insert([
            'user_id' => 1,
            'home' => true,
            'round' => 11,
            'opponent' => 'DSG Gatt FC',
            'date' => '2016-03-12',
            'start_time' => '17:00:00',
            'meeting_time' => '16:00:00',
            'location' => 'ASV 13 Platz',
            'description' => 'Rebecca hat Geburtstag!'
        ]);
        DB::table('league_games')->insert([
            'user_id' => 1,
            'home' => false,
            'round' => 10,
            'opponent' => 'DSG Wiener Spitzbuam Klub',
            'date' => '2016-03-06',
            'start_time' => '08:30:00',
            'meeting_time' => '07:30:00',
            'location' => 'Marswiese, Neuwaldegger Str. 57a, 1170 Wien',
            'result' => '0:1'
        ]);
    }
}
