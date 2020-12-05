<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJadwalsTable extends Migration
{
    public function up()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->unsignedBigInteger('departement_id');
            $table->foreign('departement_id', 'departement_fk_2719201')->references('id')->on('departments');
            $table->unsignedBigInteger('bagian_id')->nullable();
            $table->foreign('bagian_id', 'bagian_fk_2719202')->references('id')->on('sections');
        });
    }
}
