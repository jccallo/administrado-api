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
            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');

            $table->unsignedBigInteger('postulation_id')->nullable();
            $table->foreign('postulation_id')->references('id')->on('postulations')->onDelete('set null');
        
            $table->date('fecha')->nullable();
            $table->boolean('tipo_curso')->default(0); // no definido
            $table->boolean('estado_curso')->default(0); // no definido
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
