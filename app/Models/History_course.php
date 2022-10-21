<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_course extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'año',
        'semestre',
        'sigla',
        'curso',
        'creditos',
        'nota'
    ];

    // El registro académico del estudiante solo puede pertenecer a un solo usuario
    public function AcademicRecord() {
        return $this->belongsTo(AcademicRecord::class);
    }
}
