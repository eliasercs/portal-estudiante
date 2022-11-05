<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Beneficio;
use App\Models\Solicitud;

class SolicitudEstudiantil extends Controller
{
    public function data()
    {
        $record = auth()->user()->AcademicRecord[0];
        $beneficios = $record->Beneficio;
        return view('auth.Solicitudes', ['beneficios' => $beneficios]);
    }
    public function selectAcademicRecord() {
        $academic_records = auth()->user()->AcademicRecord;
        return view('auth.SolicitudEstudiantil', ['Academic_Records' => $academic_records, 'route' => '/Solicitudes',]);
    }
}
