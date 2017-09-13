
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchJobEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('branch_job_employees', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('branch_job_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            
            $table->timestamps();
            
            $table->foreign('branch_job_id')->references('id')->on('branches_jobs')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('branch_job_employees');
    }
}
