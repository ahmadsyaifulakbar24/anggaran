<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourceFundingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_fundings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_plan_id')->constrained('work_plans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('param_id')->constrained('params')->onUpdate('cascade')->onUpdate('cascade');
            $table->double('nominal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('source_fundings');
    }
}
