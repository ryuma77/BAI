<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->time('jam_masuk');
            $table->time('jam_pulang');
            $table->string('kategori_jadwal')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
