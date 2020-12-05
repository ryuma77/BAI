<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDivisionsTable extends Migration
{
    public function up()
    {
        Schema::table('divisions', function (Blueprint $table) {
            $table->unsignedBigInteger('business_unit_id');
            $table->foreign('business_unit_id', 'business_unit_fk_2682678')->references('id')->on('business_units');
        });
    }
}
