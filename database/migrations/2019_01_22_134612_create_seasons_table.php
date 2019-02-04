<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('_id');
            $table->integer('user_id');
            $table->date('air_date')->nullable();
            $table->string('name');
            $table->text('overview');
            $table->string('poster_path')->nullable();
            $table->integer('season_number');

            $table->integer('tv_show_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seasons');
    }
}
