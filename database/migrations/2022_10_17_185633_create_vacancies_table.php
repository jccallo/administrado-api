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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre'); // OBLIGATORIO
            $table->text('descripcion')->nullable(); // null
            $table->date('fecha_inicio')->nullable(); // null
            $table->date('fecha_fin')->nullable(); // null
            $table->softDeletes(); // null
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
};
