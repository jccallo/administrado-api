<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'fecha',
        'status',
        'place_id',
        'user_id',
    ];
}
