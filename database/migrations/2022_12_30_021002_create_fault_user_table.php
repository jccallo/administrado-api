<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fault_user', function (Blueprint $table) {
            $table->unsignedBigInteger('fault_id'); // OBLIGATORIO
            $table->foreign('fault_id')->references('id')->on('faults')->onDelete('cascade');

            $table->unsignedBigInteger('user_id'); // OBLIGATORIO
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->date('fecha_falta'); // OBLIGATORIO

            $table->unsignedBigInteger('place_id')->nullable(); // null
            $table->foreign('place_id')->references('id')->on('places')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fault_user');
    }
};
