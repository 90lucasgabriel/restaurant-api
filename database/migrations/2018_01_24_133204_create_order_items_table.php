<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('menu_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('diningtable_id')->unsigned();
            $table->integer('order_item_status_id')->unsigned();
            $table->integer('order_item_type_id')->unsigned();

            $table->decimal('price_person')->nullable();
            $table->decimal('price_alacarte')->nullable();
            $table->integer('quantity')->unsigned()->default(1);
            
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('diningtable_id')->references('id')->on('diningtables')->onDelete('cascade');
            $table->foreign('order_item_type_id')->references('id')->on('order_item_types')->onDelete('cascade');
            $table->foreign('order_item_status_id')->references('id')->on('order_item_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
