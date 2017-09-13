<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesJobsTable extends Migration
{
    public function up()
    {
        Schema::create('branches_jobs', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('branch_id')->unsigned();
            $table->integer('job_id')->unsigned();
            $table->decimal('price');
            $table->decimal('price_sale')->nullable();
            $table->string('duration');
            $table->timestamps();
            
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('branches_jobs');
    }
}