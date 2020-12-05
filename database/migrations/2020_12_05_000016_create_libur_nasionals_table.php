<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiburNasionalsTable extends Migration
{
    public function up()
    {
        Schema::create('libur_nasionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
