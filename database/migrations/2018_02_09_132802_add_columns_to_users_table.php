<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('facebook')->nullable()->after('remember_token');
            $table->string('twitter')->nullable()->after('remember_token');
            $table->string('instagram')->nullable()->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->dropColumn('facebook')->after('remember_token');
             $table->dropColumn('twitter')->after('remember_token');
             $table->dropColumn('instagram')->after('remember_token');
        });
    }
}
