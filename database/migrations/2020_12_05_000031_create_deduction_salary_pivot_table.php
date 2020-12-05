<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductionSalaryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('deduction_salary', function (Blueprint $table) {
            $table->unsignedBigInteger('salary_id');
            $table->foreign('salary_id', 'salary_id_fk_2728018')->references('id')->on('salaries')->onDelete('cascade');
            $table->unsignedBigInteger('deduction_id');
            $table->foreign('deduction_id', 'deduction_id_fk_2728018')->references('id')->on('deductions')->onDelete('cascade');
        });
    }
}
