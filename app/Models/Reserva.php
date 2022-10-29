<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AsistenteSocial;
use App\Models\User;

class Reserva extends Model
{
    use HasFactory;

    protected $table = "reservations_hours";
    public $timestamps = false;
    

    protected $fillable = [
        'asistente',
        'horario',
    ];

    public function Ast() {
        return $this->belongsTo(AsistenteSocial::class);
    }
}
