<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBpjsTable extends Migration
{
    public function up()
    {
        Schema::create('bpjs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_program');
            $table->float('perusahaan', 15, 2);
            $table->float('karyawan', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
