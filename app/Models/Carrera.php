<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AcademicRecord;

use App\Models\Ramo;

class Carrera extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "carreras";

    protected $fillable = [
        'nombre',
    ];

    // Relación uno a muchos
    public function Cursos() {
        return $this->hasMany(Ramo::class);
    }
}
