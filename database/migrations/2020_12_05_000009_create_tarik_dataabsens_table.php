<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarikDataabsensTable extends Migration
{
    public function up()
    {
        Schema::create('tarik_dataabsens', function (Blueprint $table) {
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
