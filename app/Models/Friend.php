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

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        // modelo de la segunda tabla, [nombre de la tabla intermedia, fk de la primera tabla, fk de la segunda tabla]
        return $this->belongsToMany(User::class, 'families', 'friend_id', 'user_id');
    }
}
