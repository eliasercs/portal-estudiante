<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Carrera;

use App\Models\CursoInscrito;

class AcademicRecord extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'plan',
        'ingreso',
        'situacion',
        'creditos',
    ];

    // El registro académico del estudiante solo puede pertenecer a un solo usuario
    public function User() {
        return $this->belongsTo(User::class);
    }

    // El registro académico del usuario solamente puede pertenecer a una sola carrera
    public function Carrera() {
        return $this->belongsTo(Carrera::class);
    }

    // Un estudiante puede inscribir muchos cursos
    public function InscripcionCurso() {
        return $this->hasMany(CursoInscrito::class,'academic_record_id', 'id');
    }
}
