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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre')->unique(); // OBLIGATORIO
            $table->enum('tipo_carrera', ['universidad', 'instituto', 'otros'])->default('otros');
            $table->enum('status', ['activo', 'inactivo'])->default('activo'); // default
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('careers');
    }
};
