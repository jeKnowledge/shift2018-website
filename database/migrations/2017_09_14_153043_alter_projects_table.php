<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects',function( Blueprint $table){
           $table->boolean('active');
           $table->string('projectLink');
           $table->integer('place');
           $table->integer('challenge_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects',function( Blueprint $table){
            $table->dropColumn('challenge_id');
            $table->dropColumn('place');
            $table->dropColumn('projectLink');
            $table->dropColumn('active');
        });
    }
}
