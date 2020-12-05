<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPromotionsTable extends Migration
{
    public function up()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_name_id');
            $table->foreign('employee_name_id', 'employee_name_fk_2714089')->references('id')->on('employees');
            $table->unsignedBigInteger('department_from_id');
            $table->foreign('department_from_id', 'department_from_fk_2714090')->references('id')->on('departments');
            $table->unsignedBigInteger('level_from_id');
            $table->foreign('level_from_id', 'level_from_fk_2714091')->references('id')->on('levels');
            $table->unsignedBigInteger('position_from_id');
            $table->foreign('position_from_id', 'position_from_fk_2714092')->references('id')->on('positions');
            $table->unsignedBigInteger('level_to_id')->nullable();
            $table->foreign('level_to_id', 'level_to_fk_2714093')->references('id')->on('levels');
            $table->unsignedBigInteger('position_to_id')->nullable();
            $table->foreign('position_to_id', 'position_to_fk_2714094')->references('id')->on('positions');
        });
    }
}
