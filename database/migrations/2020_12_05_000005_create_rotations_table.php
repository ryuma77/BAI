<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRotationsTable extends Migration
{
    public function up()
    {
        Schema::create('rotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('valid_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
