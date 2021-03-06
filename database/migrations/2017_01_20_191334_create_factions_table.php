<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFactionsTable extends Migration
{

    public function up()
    {
        Schema::create('factions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('factions');
    }
}
