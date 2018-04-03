<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToRequestContestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_contest', function($table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('contest_id')->unsigned();
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->integer('track_id')->unsigned();
            $table->foreign('track_id')->references('id')->on('tracks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_contest', function (Blueprint $table) {
             $table->dropColumn('user_id');             
             $table->dropColumn('contest_id');
             $table->dropColumn('track_id');
        });
    }
}
