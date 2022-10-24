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
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('set null');

            $table->unsignedBigInteger('postulation_id')->nullable();
            $table->foreign('postulation_id')->references('id')->on('postulations')->onDelete('set null');
        
            $table->date('fecha')->nullable();
            $table->boolean('estado_examen')->default(0); // 0: no definido
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
