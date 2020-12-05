<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marital_status')->nullable();
            $table->string('employee_status');
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat')->nullable();
            $table->string('resign')->nullable();
            $table->string('kota')->nullable();
            $table->string('kode_pos')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
