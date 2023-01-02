<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // OBLIGATORIO
            $table->string('email')->unique()->nullable(); // null
            $table->timestamp('email_verified_at')->nullable(); // null
            $table->string('password')->nullable(); // null
            $table->rememberToken(); // null
            $table->timestamps(); // null

            $table->string('dni')->unique()->nullable(); // null
            $table->string('telefono')->unique()->nullable(); // null
            $table->date('fecha_nacimiento')->nullable(); // null
            $table->string('talla_overol')->nullable(); // null
            $table->integer('talla_zapato')->nullable(); // null
            $table->decimal('talla', 10, 2)->nullable(); // null
            $table->decimal('peso', 10, 2)->nullable(); // null
            $table->string('direccion')->nullable(); // null
            $table->text('observacion')->nullable(); // null
            $table->decimal('sueldo_dia', 10, 2)->nullable(); // null
            $table->decimal('sueldo_mes', 10, 2)->nullable(); // null
            $table->string('foto_firma')->nullable(); // null
            $table->string('foto_perfil')->nullable(); // null
            $table->string('foto_huella')->nullable(); // null
            $table->enum('tipo_usuario', User::TIPO_USUARIO)->default(User::TIPO_USUARIO[0]); // default
            $table->softDeletes(); // null

            $table->unsignedBigInteger('place_id')->nullable(); // null
            $table->foreign('place_id')->references('id')->on('places')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
