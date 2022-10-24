<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'correo',
        'status',
    ];

    public function users()
    {
        // modelo de la segunda tabla, [nombre de la tabla intermedia, fk de la primera tabla, fk de la segunda tabla]
        return $this->belongsToMany(User::class, 'user_has_family', 'friend_id', 'user_id');
    }
}
