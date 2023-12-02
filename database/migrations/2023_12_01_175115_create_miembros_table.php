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
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();
            $table->string("nombre" , 100);
            $table->string('apellido' ,100);
            $table->string('direccion' ,255);
            $table->string('telefono' ,100);
            $table->string('fecha_nacimiento' ,100);
            $table->string('genero' ,50);
            $table->string('email')->unique();
            $table->string("estado" ,5);
            $table->string("ministerio" ,255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miembros');
    }
};
