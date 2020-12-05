<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInputAbsenManualsTable extends Migration
{
    public function up()
    {
        Schema::table('input_absen_manuals', function (Blueprint $table) {
            $table->unsignedBigInteger('nik_id');
            $table->foreign('nik_id', 'nik_fk_2721617')->references('id')->on('employees');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_2721624')->references('id')->on('teams');
        });
    }
}
