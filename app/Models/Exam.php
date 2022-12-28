<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    const ESTADO_EXAMEN = ['aceptado', 'pendiente', 'rechazado'];

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
