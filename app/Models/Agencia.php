<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    use HasFactory;

    protected $table = 'agencias';
    public $timestamps = false;

    // Definimos los campos que pueden ser llenados masivamente
    protected $fillable = [
        'NameAgencia',
        'NumAgencia'
    ];
}
