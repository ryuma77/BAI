<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPengajuancutisTable extends Migration
{
    public function up()
    {
        Schema::table('pengajuancutis', function (Blueprint $table) {
            $table->unsignedBigInteger('nik_id');
            $table->foreign('nik_id', 'nik_fk_2722005')->references('id')->on('employees');
            $table->unsignedBigInteger('nama_id');
            $table->foreign('nama_id', 'nama_fk_2722006')->references('id')->on('employees');
            $table->unsignedBigInteger('jenis_cuti_id');
            $table->foreign('jenis_cuti_id', 'jenis_cuti_fk_2722007')->references('id')->on('jenis_cutis');
        });
    }
}
