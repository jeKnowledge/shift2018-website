<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectAttributesToTeamTable extends Migration
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
            $table->string('project_name')->nullable();
            $table->string('project_url')->nullable();
            $table->string('project_description')->nullable();
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
            $table->dropColumn('project_name');
            $table->dropColumn('project_url');
            $table->dropColumn('project_description');
        });
    }
}
