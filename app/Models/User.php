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

    /* ------------------------------- metodos ------------------------------- */
    public function customFaults() {
        $faults = collect();
        foreach ($this->faults as $fault) {
            $newFault = collect($fault);
            $place_nombre = Place::find($fault->pivot->place_id) ? Place::find($fault->pivot->place_id)->nombre : null;
            $newPivot = collect($fault->pivot)->put('place_nombre', $place_nombre);
            $newFault->put('pivot', $newPivot);
            $faults->push($newFault);
        }
        return $faults;
    }
}
