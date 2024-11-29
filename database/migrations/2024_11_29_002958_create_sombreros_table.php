<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sombreros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('subtitulo');
            $table->string('imagen');
            $table->double('precio');
            $table->string('calidad');
            $table->string('material');
            $table->integer('ala');
            $table->integer('copa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sombreros');
    }
};
