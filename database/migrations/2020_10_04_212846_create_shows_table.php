<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();

            $table->integer('show');
            $table->integer('user_id')->unsigned();
            $table->longtext('created_by');
            $table->longtext('genres');
            $table->string('poster_path')->nullable();
            $table->string('name');
            $table->text('overview');
            $table->date('first_air_date');
            $table->string('homepage');
            $table->boolean('in_production');
            $table->date('last_air_date');
            $table->longtext('next_episode_to_air')->nullable();
            $table->integer('number_of_episodes');
            $table->integer('number_of_seasons');
            $table->string('original_language');
            $table->string('original_name');
            $table->string('popularity_tmdb');
            $table->longtext('production_companies');
            $table->longtext('networks');
            $table->string('status');
            $table->boolean('archived');
            $table->longtext('last_episode_to_air');

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
        Schema::dropIfExists('shows');
    }
}
