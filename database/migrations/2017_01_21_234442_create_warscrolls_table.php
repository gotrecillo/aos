<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarscrollsTable extends Migration
{

    public function up()
    {
        Schema::create('warscrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('army_id')->nullable()->unsigned();
            $table->foreign('army_id')
                ->references('id')
                ->on('armies')
                ->onDelete('cascade');

            $table->integer('min_size')->nullable()->unsigned();
            $table->integer('max_size')->nullable()->unsigned();
            $table->integer('points')->nullable()->unsigned();
            $table->text('description')->nullable();
            $table->text('options')->nullable();
            $table->text('abilities')->nullable();
            $table->text('command_abilities')->nullable();
            $table->string('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('warscrolls');
    }

}
