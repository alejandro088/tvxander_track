<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('episodes', function (Blueprint $table) {
            $table->boolean('watched')->default(false);
            $table->boolean('archived')->default(false);
            $table->integer('tv_show_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('episodes', function($table)
        {
            $table->dropColumn('archived');
            $table->dropColumn('watched');
            $table->dropColumn('tv_show_id');
        });

    }
}
