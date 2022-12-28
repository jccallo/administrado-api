<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    const TIPO_CURSO = ['general', 'particular', 'otros'];

    const ESTADO_CURSO = ['aceptado', 'pendiente', 'rechazado'];

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
