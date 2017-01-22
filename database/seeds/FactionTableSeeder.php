<?php

use Illuminate\Database\Seeder;

class FactionTableSeeder extends Seeder
{

    public function run()
    {

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table('factions')->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM factions');
        } else {
            DB::statement('TRUNCATE TABLE factions CASCADE');
        }

        $json     = File::get(__DIR__ . '/../data/factions.json');
        $data     = json_decode($json);
        $factions = array_map(function ($faction) {
            return (array)$faction;
        }, $data);

        DB::table('factions')->insert($factions);
    }
}
