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
        Schema::create('recommenders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('friend_id')->nullable(); // null
            $table->foreign('friend_id')->references('id')->on('friends')->onDelete('set null');

            $table->unsignedBigInteger('user_id')->nullable(); // null
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->enum('tipo', [
                'lider',
                'recomendado',
            ])->default('recomendado'); // default

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
        Schema::dropIfExists('recommenders');
    }
};
