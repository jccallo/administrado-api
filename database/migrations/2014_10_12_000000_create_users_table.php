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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // OBLIGATORIO
            $table->string('email')->unique()->nullable(); // se puso que puede aceptar null
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->string('dni')->unique()->nullable();
            $table->string('telefono')->unique()->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('talla_overol')->nullable();
            $table->integer('talla_zapato')->nullable();
            $table->decimal('talla', 10, 2)->nullable(); // para evitar errores se define de manera general
            $table->decimal('peso', 10, 2)->nullable(); // para evitar errores se define de manera general
            $table->string('direccion')->nullable();
            $table->text('observacion')->nullable();
            $table->decimal('sueldo_dia', 10, 2)->nullable();
            $table->decimal('sueldo_mes', 10, 2)->nullable();
            $table->string('foto_firma')->nullable();
            $table->string('foto_perfil')->nullable();
            $table->string('foto_huella')->nullable();
            $table->boolean('tipo_usuario')->default(0); // OBLIGATORIO
            $table->boolean('status')->default(1); // OBLIGATORIO

            $table->unsignedBigInteger('place_id')->nullable();
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
        Schema::dropIfExists('users');
    }
};
