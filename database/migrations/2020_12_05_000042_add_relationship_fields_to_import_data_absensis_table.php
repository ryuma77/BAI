<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToImportDataAbsensisTable extends Migration
{
    public function up()
    {
        Schema::table('import_data_absensis', function (Blueprint $table) {
            $table->unsignedBigInteger('nik_id')->nullable();
            $table->foreign('nik_id', 'nik_fk_2721551')->references('id')->on('employees');
        });
    }
}
