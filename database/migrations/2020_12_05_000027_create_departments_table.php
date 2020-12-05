<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('department_name')->unique();
            $table->string('department_code')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
