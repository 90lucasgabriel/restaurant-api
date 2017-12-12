<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('diningtable_id')->unsigned();

            $table->decimal('total');
            $table->smallInteger('status')->default(0);
            $table->timestamps();
            
            $table->foreign('diningtable_id')->references('id')->on('diningtables')->onDelete('cascade');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
