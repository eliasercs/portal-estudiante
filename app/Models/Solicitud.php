<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AcademicRecord;

class Solicitud extends Model
{
    use HasFactory;
    protected $table = "solicitudes";
    public $timestamps = false;

    // las solicitudes no pueden existir sin un registro académico
    public function AcademicRecord() {
        return $this->belongsTo(AcademicRecord::class);
    }
}
