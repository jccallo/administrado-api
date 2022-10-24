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
        'name',
        'email',
        'password',

        'dni',
        'telefono',
        'fecha_nacimiento',
        'talla_overol',
        'talla_zapato',
        'talla',
        'peso',
        'direccion',
        'observacion',
        'sueldo_dia',
        'sueldo_mes',
        'foto_firma',
        'foto_perfil',
        'foto_huella',
        'tipo_trabajador',
        'status',
        'place_id',
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
        // modelo de la tabla padre (brand), [fk en la tabla hija (product), pk de la tabla padre (brand)]
        return $this->belongsTo(Place::class, 'place_id', 'id');
    }

    public function friends()
    {
        // modelo de la segunda tabla, [nombre de la tabla intermedia, fk de la primera tabla, fk de la segunda tabla]
        return $this->belongsToMany(Friend::class, 'user_has_family', 'user_id', 'friend_id')->withPivot('parentesco');
    }

    /* --------------------------------- metodos -------------------------------- */

    public function getFamilyByName()
    {
        $familyNames = [];
        foreach ($this->friends as $friend) {
            array_push($familyNames, $friend->id);
        }
        $familyNames = collect($familyNames);
    }
}
