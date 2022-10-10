<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CursoInscrito;
use App\Models\Ramo;

class Seccion extends Model
{
    use HasFactory;

    protected $table = "secciones";

    protected $fillable = [
        'numero',
        'profesor',
        'horario',
        'sala',
        'capacidad',
        'inscritos',
    ];

    public $timestamps = false;

    public function CursoInscrito() {
        return $this->belongsTo(CursoInscrito::class);
    }

    public function Curso() {
        return $this->belongsTo(Ramo::class);
    }
}
