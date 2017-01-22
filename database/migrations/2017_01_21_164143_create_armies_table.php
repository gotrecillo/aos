<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmiesTable extends Migration
{

    public function up()
    {
        Schema::create('armies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('faction_id')->unsigned();

            $table->foreign('faction_id')
                ->references('id')
                ->on('factions')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('armies');
    }
}
