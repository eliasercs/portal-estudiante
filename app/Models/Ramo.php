<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Seccion;
use App\Models\Carrera;

class Ramo extends Model
{
    use HasFactory;

    protected $table = "ramos";
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'code',
        'creditos',
        'tipo',
    ];

    public function Seccion() {
        return $this->hasMany(Seccion::class, 'curso_id');
    }

    public function Carrera() {
        return $this->belongsTo(Carrera::class);
    }
}
