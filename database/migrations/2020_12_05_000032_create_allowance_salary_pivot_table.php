<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowanceSalaryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('allowance_salary', function (Blueprint $table) {
            $table->unsignedBigInteger('salary_id');
            $table->foreign('salary_id', 'salary_id_fk_2728017')->references('id')->on('salaries')->onDelete('cascade');
            $table->unsignedBigInteger('allowance_id');
            $table->foreign('allowance_id', 'allowance_id_fk_2728017')->references('id')->on('allowances')->onDelete('cascade');
        });
    }
}
