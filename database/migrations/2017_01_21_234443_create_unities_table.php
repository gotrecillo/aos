
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('wounds')->nullable()->unsigned();
            $table->integer('bravery')->nullable()->unsigned();
            $table->integer('move')->nullable()->unsigned();
            $table->integer('save')->nullable()->unsigned();
            $table->text('melee')->nullable();
            $table->text('missile')->nullable();

            $table->integer('warscroll_id')->unsigned();
            $table->foreign('warscroll_id')
                ->references('id')
                ->on('warscrolls')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('unities');
    }
}
