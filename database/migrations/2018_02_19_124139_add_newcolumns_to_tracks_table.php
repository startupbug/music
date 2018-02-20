<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewcolumnsToTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tracks', function (Blueprint $table) {
            $table->tinyInteger('featured')->nullable()->default('0')->after('description');
            $table->tinyInteger('contest')->nullable()->default('0')->after('description');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tracks', function (Blueprint $table) {
             $table->dropColumn('featured');             
             $table->dropColumn('contest');
        });
    }
}
