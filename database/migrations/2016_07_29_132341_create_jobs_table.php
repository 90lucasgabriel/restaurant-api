<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('job_category_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('jobs');
    }
}