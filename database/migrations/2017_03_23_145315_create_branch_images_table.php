<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchImagesTable extends Migration
{
    public function up()
    {
        Schema::create('branch_images', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('branch_id')->unsigned();
            $table->string('url');
            $table->text('description');
            $table->integer('index');
            $table->timestamps();
            
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('branch_images');
    }
}