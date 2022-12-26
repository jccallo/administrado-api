<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    // relationships
    const PARENTESCO = [
        // otro tipo
        'amigo(a)',
        'familiar',
        // por afinidad
        'suegro(a)',
        'yerno',
        'nuera',
        'cuñado(a)',
        // por consaguinidad
        'abuelo(a)',
        'padre',
        'madre',
        'tio(a)',
        'sobrino(a)',
        'primo(a)',
        'hermano(a)',
        'hijo(a)',
    ];

    // recommenders
    const TIPO = ['recomendado', 'lider'];

    // callers
    const ESTADO_RESPUESTA = [
        'aceptada',
        'pendiente',
        'rechazada'
    ];

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'correo',
        'status',
    ];
}
