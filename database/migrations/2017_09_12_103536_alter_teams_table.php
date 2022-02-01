<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function(Blueprint $table)
        {   
           $table->dropColumn('shifter_id');
           $table->integer('user_id')->unsigned()->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('teams', function(Blueprint $table)
        {
            $table->dropColumn('user_id');
            $table->integer('shifter_id')->unsigned();
        });
    }
}
