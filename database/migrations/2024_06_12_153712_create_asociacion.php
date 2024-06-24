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
        Schema::create('asociacion', function (Blueprint $table) {
            $table->id();
            $table->string('fechaAccion');
            $table->string('vinculado');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('lnacimiento');
            $table->string('tidentificacion');
            $table->string('noidentificacion');
            $table->date('fechaexpedicion');
            $table->string('lexpedicion');
            $table->string('dcorrespondencia');
            $table->string('genero');
            $table->string('ciudad');
            $table->date('fnacimiento');
            $table->string('dresidencia');
            $table->string('empresatrabaja');
            $table->string('dtrabajo');
            $table->string('cargo');
            $table->string('ciudadempresa');
            $table->string('tiempocargo');
            $table->string('celular1');
            $table->string('whatsapp1');
            $table->string('celular2')->nullable();
            $table->string('whatsapp2')->nullable();
            $table->string('correo');
            $table->string('autoriza');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asociacion');
    }
};
