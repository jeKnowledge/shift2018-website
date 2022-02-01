<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications',function( Blueprint $table){
           $table->dropColumn('portfolio');
           $table->renameColumn('firstTime','isFirstTime');
           $table->renameColumn('accepted','isAccepted');
           $table->integer('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications',function( Blueprint $table){
            $table->string('portfolio')->nullable();
            $table->renameColumn('isFirstTime','firstTime');
            $table->renameColumn('isAccepted','accepted');
            $table->dropColumn('user_id');
        });
    }
}
