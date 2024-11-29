<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('apellidoP', 50);
            $table->string('apellidoM', 50);
            $table->string('correo', 100)->unique();
            $table->string('contraseña', 255);
            $table->string('calle', 100);
            $table->string('ciudad');
            $table->string('estado');
            $table->string('CodigoP', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};