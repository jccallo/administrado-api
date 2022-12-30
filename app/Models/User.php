<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    const TIPO_USUARIO = ['otros', 'externo', 'permanente'];

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

    public function callers()
    {
        return $this->belongsToMany(Friend::class, 'callers', 'user_id', 'friend_id')
            ->withPivot('estado_respuesta');
    }

    public function faults()
    {
        return $this->belongsToMany(Fault::class, 'fault_user', 'user_id', 'fault_id')
            ->withPivot('fecha_falta', 'place_id');
    }

    public function careers()
    {
        return $this->belongsToMany(Career::class, 'career_user', 'user_id', 'career_id');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_user', 'user_id', 'job_id');
    }

    public function accounts()
    {
        return $this->belongsToMany(Bank::class, 'bank_user', 'user_id', 'bank_id')
            ->withPivot('numero_cuenta', 'numero_cuenta_interbancario');
    }

    /* --------------------------------- metodos -------------------------------- */

    // public function getPlaceName()
    // {
    //     return isset($this->place) ? $this->place->nombre : null;
    // }

    // public function getRelationships()
    // {
    //     $relationships = collect();
    //     foreach ($this->relationships as $relationship) {
    //         $relationships->push([
    //             'id' => $relationship->id,
    //             'nombre' => $relationship->nombre,
    //             'parentesco' => $relationship->pivot->parentesco,
    //         ]);
    //     }
    //     return $relationships->count() > 0 ? $relationships : null;
    // }

    // public function getRecommenders()
    // {
    //     $recommenders = collect();
    //     foreach ($this->recommenders as $recommender) {
    //         $recommenders->push([
    //             'id' => $recommender->id,
    //             'nombre' => $recommender->nombre,
    //             'tipo' => $recommender->pivot->tipo,
    //         ]);
    //     }
    //     return $recommenders->count() > 0 ? $recommenders : null;
    // }
}
