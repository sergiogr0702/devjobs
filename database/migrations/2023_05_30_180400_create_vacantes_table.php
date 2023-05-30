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
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('empresa');
            $table->date('ultimo_dia');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacantes');
    }
};
