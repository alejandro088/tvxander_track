<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_shows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show');
            $table->integer('user_id');
            $table->longtext('created_by');
            $table->longtext('genres');
            $table->string('poster_path')->nullable();
            $table->string('name');
            $table->text('overview');
            $table->date('first_air_date');
            $table->string('homepage');
            $table->boolean('in_production');
            $table->date('last_air_date');
            $table->longtext('next_episode_to_air');
            $table->integer('number_of_episodes');
            $table->integer('number_of_seasons');
            $table->string('original_language');
            $table->string('original_name');
            $table->string('popularity_tmdb');
            $table->longtext('production_companies');
            $table->longtext('networks');
            $table->string('status');
            
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
        Schema::dropIfExists('tv_shows');
    }
}
