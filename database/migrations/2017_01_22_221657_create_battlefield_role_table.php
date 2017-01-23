<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBattlefieldRoleTable extends Migration
{

    public function up()
    {
        Schema::create('battlefield_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('battlefield_role_warscroll', function (Blueprint $table) {
            $table->integer('battlefield_role_id')->unsigned();
            $table->integer('warscroll_id')->unsigned();

            $table->foreign('battlefield_role_id')
                ->references('id')
                ->on('battlefield_roles')
                ->onDelete('cascade');

            $table->foreign('warscroll_id')
                ->references('id')
                ->on('warscrolls')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('battlefield_role_warscroll');
        Schema::dropIfExists('battlefield_roles');
    }
}
