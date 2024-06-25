<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociacion extends Model
{
    use HasFactory;

    // Definimos la tabla asociada al modelo
    protected $table = 'asociacion';
    public $timestamps = false;

    // Definimos los campos que pueden ser llenados masivamente
    protected $fillable = [
        'fechaAccion',
        'vinculado',
        'nombre',
        'apellidos',
        'lnacimiento',
        'tidentificacion',
        'noidentificacion',
        'fechaexpedicion',
        'lexpedicion',
        'dcorrespondencia',
        'ciudcorrespondencia',
        'genero',
        'ciudad',
        'fnacimiento',
        'dresidencia',
        'ciudadresidencia',
        'empresatrabaja',
        'dtrabajo',
        'cargo',
        'ciudadempresa',
        'tiempocargo',
        'celular1',
        'whatsapp1',
        'celular2',
        'whatsapp2',
        'correo',
        'autoriza',
    ];

    protected $attributes = [
        'fechaAccion' => null,
        'vinculado' => null,
        'nombre' => null,
        'apellidos' => null,
        'lnacimiento' => null,
        'tidentificacion' => null,
        'noidentificacion' => null,
        'fechaexpedicion' => null,
        'lexpedicion' => null,
        'dcorrespondencia' => null,
        'genero' => null,
        'ciudad' => null,
        'fnacimiento' => null,
        'dresidencia' => null,
        'empresatrabaja' => null,
        'dtrabajo' => null,
        'cargo' => null,
        'ciudadempresa' => null,
        'tiempocargo' => null,
        'celular1' => null,
        'whatsapp1' => null,
        'celular2' => null,
        'whatsapp2' => null,
        'correo' => null,
        'autoriza' => null,
    ];
}

