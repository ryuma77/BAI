<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisCutisTable extends Migration
{
    public function up()
    {
        Schema::create('jenis_cutis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_cuti')->unique();
            $table->string('jenis_cuti')->unique();
            $table->integer('maks_pertahun')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
