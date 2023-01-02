<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre', // OBLIGATORIO
    ];

    public function users() // no se usa
    {
        return $this->hasMany(User::class, 'place_id', 'id');
    }
}
