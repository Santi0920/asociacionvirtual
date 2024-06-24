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
        Schema::create('auditoria', function (Blueprint $table) {
            $table->id();
            $table->timestamp('Hora_login')->nullable();
            $table->string('Usuario_nombre');
            $table->string('Usuario_Rol');
            $table->string('AgenciaU');
            $table->string('Accion_realizada');
            $table->timestamp('Hora_Accion')->nullable();
            $table->string('Cedula_Registrada');
            $table->timestamp('cerro_sesion')->nullable();
            $table->string('IP');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditoria');
    }
};
