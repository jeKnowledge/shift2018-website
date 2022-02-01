<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {   
            $table->integer('phoneNumber')->nullable();
            $table->string('bio')->nullable();
            $table->string('job')->nullable();
            $table->integer('role')->default(4);
            $table->integer('team_id')->unsigned()->nullable();
            $table->integer('application_id')->unsigned()->nullable();
            $table->string('website')->nullable();
            $table->string('github')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('university')->nullable();
            $table->string('course')->nullable();
            $table->string('institution')->nullable();
            $table->integer('age')->unsigned()->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->boolean('isStudent')->nullable();
            $table->string('function')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropColumn('phoneNumber');
            $table->dropColumn('bio');
            $table->dropColumn('job');
            $table->dropColumn('role');
            $table->dropColumn('team_id');
            $table->dropColumn('application_id'); 
            $table->dropColumn('website');
            $table->dropColumn('github');
            $table->dropColumn('twitter');
            $table->dropColumn('linkedin');
            $table->dropColumn('university');
            $table->dropColumn('course');
            $table->dropColumn('institution');
            $table->dropColumn('age');
            $table->dropColumn('location');
            $table->dropColumn('type');
            $table->dropColumn('isStudent');
            $table->dropColumn('function');
        });
    } 
}
