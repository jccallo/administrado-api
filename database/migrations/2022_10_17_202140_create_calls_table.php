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
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->enum('estado_respuesta', ['aceptado', 'pendiente', 'rechazado'])->default('pendiente');
            $table->enum('status', ['activo', 'inactivo'])->default('activo'); // default

            $table->unsignedBigInteger('friend_id')->nullable();
            $table->foreign('friend_id')->references('id')->on('friends')->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
};
