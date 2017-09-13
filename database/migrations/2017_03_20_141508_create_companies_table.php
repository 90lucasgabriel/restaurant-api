<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('cpf', 11);
            $table->string('cnpj', 16);
            $table->string('avatar');

            $table->string('phone_1', 15);
            $table->string('phone_2', 15);
            $table->string('email_1');
            $table->string('email_2');
            $table->string('website');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('companies');
    }
}