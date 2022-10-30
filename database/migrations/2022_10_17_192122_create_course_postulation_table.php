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
        Schema::create('course_postulation', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');

            $table->unsignedBigInteger('postulation_id');
            $table->foreign('postulation_id')->references('id')->on('postulations');

            $table->date('fecha')->nullable();
            $table->enum('tipo_curso', ['general', 'particular', 'otros'])->default('otros');
            $table->enum('estado_curso', ['aceptado', 'pendiente', 'rechazado'])->default('pendiente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_postulation');
    }
};
