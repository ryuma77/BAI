<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputAbsenManualsTable extends Migration
{
    public function up()
    {
        Schema::create('input_absen_manuals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_address')->unique();
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
