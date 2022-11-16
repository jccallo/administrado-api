<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    const RELATIONSHIPS =  [
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

    protected $fillable = [
        'friend_id', // null
        'user_id', // null
        'parentesco', // default
        'status', // default
    ];
}
