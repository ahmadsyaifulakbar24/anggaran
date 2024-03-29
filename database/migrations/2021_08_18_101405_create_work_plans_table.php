<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('user_ro_id')->unsigned();
            $table->string('component_code');
            $table->string('component_name');
            $table->double('total_target');
            $table->bigInteger('unit_target')->unsigned();
            $table->double('budged');
            $table->text('detail')->nullable();
            $table->text('description')->nullable();
            $table->boolean('target_indicator_status');
            $table->boolean('assignment_status');
            $table->foreignId('target_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('indicator_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pph7_id')->nullable()->constrained('params')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('deputi_status', ['accept', 'pending', 'decline']);
            $table->enum('admin_status', ['accept', 'pending', 'decline'])->nullable();
            $table->enum('permission', ['lock', 'unlock'])->default('unlock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_plans');
    }
}
