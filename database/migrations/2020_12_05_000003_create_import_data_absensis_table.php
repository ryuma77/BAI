<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportDataAbsensisTable extends Migration
{
    public function up()
    {
        Schema::create('import_data_absensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal')->nullable();
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
