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

            $table->enum('estado_respuesta', [
                'aceptado',
                'pendiente',
                'rechazado'
            ])->default('pendiente'); // default

            $table->enum('status', ['activo', 'inactivo'])->default('activo'); // default

            $table->unsignedBigInteger('friend_id'); // OBLIGATORIO
            $table->foreign('friend_id')->references('id')->on('friends');

            $table->unsignedBigInteger('user_id'); // OBLIGATORIO
            $table->foreign('user_id')->references('id')->on('users');
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
