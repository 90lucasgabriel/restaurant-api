<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderLive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_live', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->integer('order_type_id')->unsigned();
            $table->integer('order_status_id')->unsigned();
            $table->integer('menu_id')->unsigned();
            $table->integer('product_id')->unsigned();
            
            $table->integer('price')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('total')->unsigned();
            $table->text('comment');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('order_type_id')->references('id')->on('order_type')->onDelete('cascade');
            $table->foreign('order_status_id')->references('id')->on('order_status')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_live');
    }
}
