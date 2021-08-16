<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('parent_id')->nullable()->unsigned();
            $table->string('parent_path')->nullable();
            $table->string('code_activity');
            $table->string('description')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('updated_by')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('unit_id')->unsigned();
            $table->enum('activity_type', ['code_activity', 'actvity']);
            $table->timestamps();
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('activities')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
