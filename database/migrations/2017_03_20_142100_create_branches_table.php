<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCompaniesTable
 */
class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('company_id')->unsigned();
            
            $table->string('phone_1', 20);
            $table->string('phone_2', 20)->nullable();
            $table->string('email_1');
            $table->string('email_2')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            
            $table->text('address');
            $table->integer('number')->unsigned();
            $table->string('complement')->nullable();
            $table->string('zipcode');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('Brasil');
            $table->timestamps();
            
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}