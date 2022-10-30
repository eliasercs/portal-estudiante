<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AsistenteSocial;
use App\Models\InscripcionHours;

class Reserva extends Model
{
    use HasFactory;

    protected $table = "reservations_hours";
    public $timestamps = false;
    

    protected $fillable = [
        'asistente',
        'fecha',
        'hora'
    ];

    public function Ast() {
        return $this->hasMany(AsistenteSocial::class,'id','Asistente');
    }
    public function Disp() {
        return $this->hasOne(InscripcionHours::class);
    }
}
