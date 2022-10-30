<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Reserva;

class InscripcionHours extends Model
{
    use HasFactory;

    protected $table = "inscripcion_hours";
    public $timestamps = false;

    protected $fillable = [
        'idhora',
        'idusuario',
    ];

    public function Hours() {
        return $this->hasOne(Reserva::class,'id','IDHora');
    }

    public function User() {
        return $this->hasOne(User::class);
    }
}
