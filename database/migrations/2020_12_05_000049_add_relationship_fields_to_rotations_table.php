<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRotationsTable extends Migration
{
    public function up()
    {
        Schema::table('rotations', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_name_id')->nullable();
            $table->foreign('employee_name_id', 'employee_name_fk_2713990')->references('id')->on('employees');
            $table->unsignedBigInteger('department_from_id')->nullable();
            $table->foreign('department_from_id', 'department_from_fk_2713991')->references('id')->on('departments');
            $table->unsignedBigInteger('department_to_id')->nullable();
            $table->foreign('department_to_id', 'department_to_fk_2713992')->references('id')->on('departments');
        });
    }
}
