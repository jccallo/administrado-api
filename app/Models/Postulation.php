<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postulation extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    const ESTADO_POSTULACION = ['aceptada', 'pendiente', 'rechazada'];

    protected $fillable = [
        'estado_postulacion',
        'user_id',
        'vacancy_id',
    ];

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_postulation', 'postulation_id', 'exam_id')
            ->withPivot('estado_examen', 'fecha_examen');
    }
}
