<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status')->unique();
            $table->string('description')->nullable();
        });

        Schema::table('histories', function (Blueprint $table) {
            $table->foreign('status')->references('status')->on('history_statuses')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_statuses');
    }
}
