<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job', function (Blueprint $table) {
            $table->string('name');
            $table->string('position');
            $table->string('description');
            $table->string('benefit');
            $table->string('gender');
            $table->string('requirement');
            $table->string('number');
            $table->string('brief');
            $table->integer('rank_id')->unsigned();
            $table->integer('certificate_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->integer('salary_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
}
