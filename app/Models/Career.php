<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    const TIPO_CARRERA = ['universidad', 'instituto', 'otros'];

    protected $fillable = [
        'nombre',
        'tipo_carrera',
    ];
}
