<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();

            $table->integer('external_id')->nullable();
            $table->integer('show_id')->unsigned();
            $table->integer('season_id')->unsigned();
            $table->integer('user_id');
            $table->date('air_date')->nullable();
            $table->longtext('crew');
            $table->integer('episode_number');
            $table->longtext('guest_stars');
            $table->string('name');
            $table->text('overview');
            $table->integer('season_number');
            $table->string('still_path')->nullable();
            $table->string('vote_average_tmdb');
            $table->string('vote_count_tmdb');
            $table->boolean('watched')->default(false);
            $table->boolean('archived')->default(false);

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
