<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // OBLIGATORIO
        'email', // null
        'password', // null
        'dni', // null
        'telefono', // null
        'fecha_nacimiento', // null
        'talla_overol', // null
        'talla_zapato', // null
        'talla', // null
        'peso', // null
        'direccion', // null
        'observacion', // null
        'sueldo_dia', // null
        'sueldo_mes', // null
        'foto_firma', // null
        'foto_perfil', // null
        'foto_huella', // null
        'tipo_usuario', // default
        'status', // default
        'place_id', // null
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* ------------------------------- relaciones ------------------------------- */

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }

    public function relationships()
    {
        return $this->belongsToMany(Friend::class, 'relationships', 'user_id', 'friend_id')
            ->withPivot('parentesco');
    }

    public function recommenders()
    {
        return $this->belongsToMany(Friend::class, 'recommenders', 'user_id', 'friend_id')
            ->withPivot('tipo');
    }

    /* --------------------------------- metodos -------------------------------- */

    public function getPlaceName()
    {
        return isset($this->place) ? $this->place->nombre : null;
    }

    public function getRelationships()
    {
        $relationships = collect();
        foreach ($this->relationships as $relationship) {
            $relationships->push([
                'id' => $relationship->id,
                'nombre' => $relationship->nombre,
                'parentesco' => $relationship->pivot->parentesco,
            ]);
        }
        return $relationships->count() > 0 ? $relationships : null;
    }

    public function getRecommenders()
    {
        $recommenders = collect();
        foreach ($this->recommenders as $recommender) {
            $recommenders->push([
                'id' => $recommender->id,
                'nombre' => $recommender->nombre,
                'tipo' => $recommender->pivot->tipo,
            ]);
        }
        return $recommenders->count() > 0 ? $recommenders : null;
    }
}
