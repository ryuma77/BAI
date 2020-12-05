<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalariesTable extends Migration
{
    public function up()
    {
        Schema::table('salaries', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id', 'employee_fk_2683530')->references('id')->on('employees');
        });
    }
}
