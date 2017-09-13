<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            
            $table->string('email', 170)->change();
            $table->string('role')->default('client');

            $table->string('social')->nullable()->default('local');
            $table->string('id_social', 170)->unique()->nullable();

            $table->string('avatar')->nullable();

            /*
            $table->integer('social')->unsigned()->default(0);
            $table->string('id_social', 170)->nullable();

            $table->foreign('social')->references('id')->on('socials')->onDelete('cascade');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->string('email')->change();

            $table->dropColumn('first_name');
            $table->dropColumn('last_name');            
            $table->dropColumn('role');

            $table->dropColumn('social');
            $table->dropColumn('id_social');
        });
        */
    }
}
