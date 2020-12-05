<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBpjSalaryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bpj_salary', function (Blueprint $table) {
            $table->unsignedBigInteger('salary_id');
            $table->foreign('salary_id', 'salary_id_fk_2728016')->references('id')->on('salaries')->onDelete('cascade');
            $table->unsignedBigInteger('bpj_id');
            $table->foreign('bpj_id', 'bpj_id_fk_2728016')->references('id')->on('bpjs')->onDelete('cascade');
        });
    }
}
