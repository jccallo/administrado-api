<?php

use App\Models\Friend;
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
            $table->unsignedBigInteger('friend_id'); // OBLIGATORIO
            $table->foreign('friend_id')->references('id')->on('friends')->onDelete('cascade');

            $table->unsignedBigInteger('user_id'); // OBLIGATORIO
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('tipo', ['recomendado', 'lider']); // OBLIGATORIO

            $table->unique(['friend_id', 'user_id']);
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
