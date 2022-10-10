<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Seccion;
use App\Models\AcademicRecord;

class CursoInscrito extends Model
{
    use HasFactory;

    protected $table = "cursos_inscritos";

    public function Seccion() {
        return $this->hasOne(Seccion::class);
    }

    // El curso inscrito no puede existir sin un registro académico
    public function AcademicRecord() {
        return $this->belongsTo(AcademicRecord::class);
    }
}
