<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserKroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_kro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpate('cascade');
            $table->foreignId('user_activity_id')->constrained('user_activities')->onDelete('cascade')->onUpate('cascade');
            $table->foreignId('kro_id')->constrained('kro')->onDelete('cascade')->onUpate('cascade');
            $table->enum('type_kro', ['pn', 'non_pn']);
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
        Schema::dropIfExists('user_kros');
    }
}
