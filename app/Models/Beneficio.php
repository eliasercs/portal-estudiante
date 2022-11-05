<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AcademicRecord;

class Beneficio extends Model
{
    use HasFactory;
    protected $table = "beneficios";
    public $timestamps = false;

    // los beneficios no pueden existir sin un registro académico
    public function AcademicRecord() {
        return $this->belongsTo(AcademicRecord::class);
    }
}
