<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('position_name')->unique();
            $table->string('kode_jabatan')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
