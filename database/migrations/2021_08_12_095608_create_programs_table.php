<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('code_program');
            $table->bigInteger('parent_id')->nullable()->unsigned();
            $table->string('parent_path')->nullable();
            $table->string('description')->nullable();
            $table->enum('program_type', ['program', 'sub_program', 'code_program']);
            $table->timestamps();
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
