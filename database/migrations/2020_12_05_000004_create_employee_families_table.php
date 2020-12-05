<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeFamiliesTable extends Migration
{
    public function up()
    {
        Schema::create('employee_families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('family_name');
            $table->string('status')->nullable();
            $table->longText('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
