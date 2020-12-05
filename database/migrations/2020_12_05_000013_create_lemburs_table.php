<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembursTable extends Migration
{
    public function up()
    {
        Schema::create('lemburs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address')->unique();
            $table->date('tanggal');
            $table->integer('jam_lembur');
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
