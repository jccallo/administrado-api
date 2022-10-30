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
            $table->foreign('user_id')->references('id')->on('users'); //OBLIGATORIO
            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('friend_id');
            $table->foreign('friend_id')->references('id')->on('friends'); //OBLIGATORIO

            $table->enum('tipo', [
                'lider',
                'recomendado',
                'regular',
            ])->default('regular'); // default
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
