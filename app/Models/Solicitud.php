<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AcademicRecord;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = "solicitudes";
    public $timestamps = false;
    protected $fillable = [
        'user',
        'Tipo',
        'Año',
        'Semestre',
        'Motivo1',
        'Motivo2',
        'Detalle',
        'Fecha'
    ];

    // las solicitudes no pueden existir sin un registro académico
    public function AcademicRecord() {
        return $this->belongsTo(AcademicRecord::class);
    }
}
