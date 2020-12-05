<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id', 'department_fk_2683095')->references('id')->on('departments');
            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id', 'division_fk_2683096')->references('id')->on('divisions');
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id', 'position_fk_2683284')->references('id')->on('positions');
        });
    }
}
