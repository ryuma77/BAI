<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmployeeFamiliesTable extends Migration
{
    public function up()
    {
        Schema::table('employee_families', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_name_id');
            $table->foreign('employee_name_id', 'employee_name_fk_2713755')->references('id')->on('employees');
            $table->unsignedBigInteger('nik_id');
            $table->foreign('nik_id', 'nik_fk_2727114')->references('id')->on('employees');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_2727170')->references('id')->on('teams');
        });
    }
}
