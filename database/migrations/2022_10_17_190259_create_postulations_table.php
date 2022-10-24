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
        Schema::create('postulations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->boolean('estado_postulacion')->default(0); // 0: no definido
            $table->boolean('status')->default(1); // 0: inactivo 1: activo

            $table->unsignedBigInteger('vacancy_id')->nullable();
            $table->foreign('vacancy_id')->references('id')->on('vacancies')->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulations');
    }
};
