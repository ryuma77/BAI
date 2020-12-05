<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedBigInteger('division_name_id');
            $table->foreign('division_name_id', 'division_name_fk_2682682')->references('id')->on('divisions');
        });
    }
}
