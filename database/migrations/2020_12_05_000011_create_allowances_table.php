<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllowancesTable extends Migration
{
    public function up()
    {
        Schema::create('allowances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_allowance')->unique();
            $table->string('allowance')->unique();
            $table->string('allowance_type');
            $table->float('nilai', 15, 2);
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
