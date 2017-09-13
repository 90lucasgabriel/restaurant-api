
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->string('cpf', 11);
            $table->string('cnpj', 16);
            
            $table->string('phone_1', 15);
            $table->string('phone_2', 15);
            
            $table->text('address');
            $table->string('complement');
            $table->string('zipcode');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->timestamps(); 
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('clients');
    }
}
