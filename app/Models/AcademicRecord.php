<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Carrera;
use App\Models\CursoInscrito;

use App\Models\Beneficio;
use App\Models\Solicitud;

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
    public function History() {
        return $this->hasMany(History_course::class,'record', 'id');
    }
    public function Beneficio() {
        return $this->hasMany(Beneficio::class,'user', 'id');
    }
    public function Solicitudes() {
        return $this->hasMany(Solicitud::class,'user', 'id');
    }
}
