<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('auto_cancel_cuti');
            $table->string('awal_saldo_cuti');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
