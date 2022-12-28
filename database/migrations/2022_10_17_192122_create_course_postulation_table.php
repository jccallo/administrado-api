<?php

use App\Models\Course;
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
            $table->unsignedBigInteger('course_id'); // OBLIGATORIO
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('postulation_id'); // OBLIGATORIO
            $table->foreign('postulation_id')->references('id')->on('postulations')->onDelete('cascade');

            $table->enum('tipo_curso', Course::TIPO_CURSO); // OBLIGATORIO
            $table->enum('estado_curso',  Course::ESTADO_CURSO); // OBLIGATORIO
            $table->date('fecha_curso'); // OBLIGATORIO

            $table->unique(['course_id', 'postulation_id']);
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
