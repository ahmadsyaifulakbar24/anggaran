<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_targets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::table('work_plans', function (Blueprint $table) {
            $table->foreign('unit_target')->references('id')->on('unit_targets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_targets');
    }
}
