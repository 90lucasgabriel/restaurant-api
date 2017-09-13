<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeekdaysTable extends Migration
{
    public function up()
    {
        Schema::create('weekdays', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('weekdays');
    }
}
