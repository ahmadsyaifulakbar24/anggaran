<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_ro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpate('cascade');
            $table->foreignId('user_kro_id')->constrained('user_kro')->onDelete('cascade')->onUpate('cascade');
            $table->string('code_ro');
            $table->string('ro');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::table('work_plans', function (Blueprint $table) {
            $table->foreign('user_ro_id')->references('id')->on('user_ro')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('file_managers', function (Blueprint $table) {
            $table->foreign('user_ro_id')->references('id')->on('user_ro')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_ros');
    }
}
