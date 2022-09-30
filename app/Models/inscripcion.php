<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'rut',
        'curso',
    ];
}