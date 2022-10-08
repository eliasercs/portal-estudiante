<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class AcademicRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrera',
        'ingreso',
        'situacion',
        'plan',
    ];

    public function User() {
        return $this->belongsTo(User::class);
    }

}
