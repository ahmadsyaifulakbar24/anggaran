<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkPlanTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_plan_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_plan_id')->constrained('work_plans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('param_id')->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('category', ['indicator', 'sources_of_funding']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_plan_tags');
    }
}
