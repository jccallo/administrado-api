<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
