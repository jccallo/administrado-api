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
            $table->unsignedBigInteger('exam_id');
            $table->foreign('exam_id')->references('id')->on('exams');

            $table->unsignedBigInteger('postulation_id');
            $table->foreign('postulation_id')->references('id')->on('postulations');

            $table->date('fecha')->nullable();
            $table->enum('estado_examen', ['aceptado', 'pendiente', 'rechazado'])->default('pendiente');
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
