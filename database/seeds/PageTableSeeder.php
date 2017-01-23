<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{

    public function run()
    {

        if (DB::connection()->getDriverName() == 'mysql') {
            DB::table('pages')->truncate();
        } elseif (DB::connection()->getDriverName() == 'sqlite') {
            DB::statement('DELETE FROM pages');
        } else {
            DB::statement('TRUNCATE TABLE pages CASCADE');
        }

        $json   = File::get(__DIR__ . '/../data/pages.json');
        $data   = json_decode($json);
        $pages = array_map(function ($page) {
            return (array)$page;
        }, $data);

        DB::table('pages')->insert($pages);


    }
}
