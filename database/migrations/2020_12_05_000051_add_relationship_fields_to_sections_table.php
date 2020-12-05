<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSectionsTable extends Migration
{
    public function up()
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->unsignedBigInteger('department_name_id');
            $table->foreign('department_name_id', 'department_name_fk_2682705')->references('id')->on('departments');
        });
    }
}
