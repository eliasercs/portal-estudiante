<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reserva;

class AsistenteSocial extends Model
{
    use HasFactory;

    protected $table = "social_assistants";
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    public function Horas() {
        return $this->belongsTo(Reserva::class);
    }
}
