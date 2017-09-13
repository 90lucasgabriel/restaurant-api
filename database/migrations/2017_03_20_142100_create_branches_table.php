<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('company_id')->unsigned();
            
            $table->string('phone_1', 15);
            $table->string('phone_2', 15);
            $table->string('email_1');
            $table->string('email_2');
            $table->string('website');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            
            $table->text('address');
            $table->string('complement');
            $table->string('zipcode');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->timestamps();
            
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('branches');
    }
}