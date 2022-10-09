<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Carrera;

class AcademicRecord extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'plan',
        'ingreso',
        'situacion',
    ];

    // El registro académico del estudiante solo puede pertenecer a un solo usuario
    public function User() {
        return $this->belongsTo(User::class);
    }

    // El registro académico del usuario solamente puede pertenecer a una sola carrera
    public function Carrera() {
        return $this->belongsTo(Carrera::class);
    }
}
