<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('_id');
            $table->integer('user_id');
            $table->date('air_date');
            $table->longtext('crew');
            $table->integer('episode_number');
            $table->longtext('guest_stars');
            $table->string('name');
            $table->text('overview');
            $table->integer('season_number');
            $table->string('still_path')->nullable();
            $table->string('vote_average_tmdb');
            $table->string('vote_count_tmdb');
            $table->integer('season_id');
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
        Schema::dropIfExists('episodes');
    }
}
