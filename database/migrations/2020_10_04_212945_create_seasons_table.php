<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->integer('external_id')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('show_id')->unsigned();
            $table->date('air_date')->nullable();
            $table->string('name');
            $table->text('overview');
            $table->string('poster_path')->nullable();
            $table->integer('season_number');

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
