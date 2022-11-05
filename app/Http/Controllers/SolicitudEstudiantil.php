<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudEstudiantil extends Controller
{
    public function data()
    {
        return view('auth.SolicitudEstudiantil');
    }
    public function selectAcademicRecord() {
        $academic_records = auth()->user()->AcademicRecord;
        return view('auth.Solicitudes', ['Academic_Records' => $academic_records, 'route' => '/Solicitudes',]);
    }
}
