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
        Schema::create('exam_postulation', function (Blueprint $table) {
            $table->unsignedBigInteger('exam_id'); // OBLIGATORIO
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');

            $table->unsignedBigInteger('postulation_id'); // OBLIGATORIO
            $table->foreign('postulation_id')->references('id')->on('postulations')->onDelete('cascade');

            $table->enum('estado_examen', ['aceptado', 'pendiente', 'rechazado']); // OBLIGATORIO
            $table->date('fecha_examen'); // OBLIGATORIO

            $table->unique(['exam_id', 'postulation_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_postulation');
    }
};
