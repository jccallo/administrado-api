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
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre'); // OBLIGATORIO
            $table->string('telefono')->unique()->nullable(); // null
            $table->string('direccion')->nullable(); // null
            $table->string('correo')->unique()->nullable(); // null
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
        Schema::dropIfExists('friends');
    }
};
