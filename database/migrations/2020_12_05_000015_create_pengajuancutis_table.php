<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuancutisTable extends Migration
{
    public function up()
    {
        Schema::create('pengajuancutis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_cuti');
            $table->integer('lama_cuti');
            $table->integer('sisa_cuti')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
