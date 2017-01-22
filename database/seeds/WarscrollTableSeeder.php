<?php

use Illuminate\Database\Seeder;

class WarscrollTableSeeder extends Seeder
{

    public function run()
    {

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table('warscrolls')->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM warscrolls');
        } else {
            DB::statement('TRUNCATE TABLE warscrolls CASCADE');
        }

        $json       = File::get(__DIR__ . '/../data/warscrolls.json');
        $data       = json_decode($json);
        $warscrolls = array_map(function ($warscroll) {
            return (array)$warscroll;
        }, $data);


        DB::table('warscrolls')->insert($warscrolls);


    }
}
