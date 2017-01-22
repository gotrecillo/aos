<?php

use Illuminate\Database\Seeder;

class ArmyTableSeeder extends Seeder
{

    public function run()
    {

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table('armies')->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM armies');
        } else {
            DB::statement('TRUNCATE TABLE armies CASCADE');
        }

        $json   = File::get(__DIR__ . '/../data/armies.json');
        $data   = json_decode($json);
        $armies = array_map(function ($army) {
            return (array)$army;
        }, $data);

        DB::table('armies')->insert($armies);


    }
}
