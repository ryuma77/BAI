<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobdescsTable extends Migration
{
    public function up()
    {
        Schema::table('jobdescs', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id', 'department_fk_2714324')->references('id')->on('departments');
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id', 'position_fk_2714325')->references('id')->on('positions');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id', 'level_fk_2714326')->references('id')->on('levels');
        });
    }
}
