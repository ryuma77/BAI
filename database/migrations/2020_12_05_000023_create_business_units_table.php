<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('business_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('business_unit_code')->unique();
            $table->string('business_unit_name')->unique();
            $table->string('lokasi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
