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
        Schema::create('relationships', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); // OBLIGATORIO
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('friend_id'); // OBLIGATORIO
            $table->foreign('friend_id')->references('id')->on('friends');

            $table->enum('parentesco', [
                // por afinidad
                'suegro',
                'yerno',
                'nuera',
                'cuniado',
                // por consaguinidad
                'abuelo',
                'padre',
                'madre',
                'tio',
                'sobrino',
                'primo',
                'hermano',
                'hijo',
                // otro tipo
                'familiar',
            ])->default('familiar'); // default
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
};
