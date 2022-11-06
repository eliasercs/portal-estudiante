<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Beneficio;
use App\Models\Solicitud;
use App\Models\AcademicRecord;

class SolicitudEstudiantil extends Controller
{
    public function data(Request $request)
    { 
        $record = AcademicRecord::find($request->data);
        $now = Carbon::now();
        $año = $now->year;
        if($now->month <7){
            $sem = 1;
        }else{
            $sem = 2;
        }
        $date = $now->toDateString();
        $beneficios = $record->Beneficio;
        $solicitudes = $record->Solicitudes;
        return view('auth.Solicitudes', ['beneficios' => $beneficios, 'record' => $record, 'año'=> $año, 'semestre' => $sem, 'now' => $date, 'sol' => $solicitudes]);
    }
    public function selectAcademicRecord() {
        $academic_records = auth()->user()->AcademicRecord;
        return view('auth.SolicitudEstudiantil', ['Academic_Records' => $academic_records, 'route' => '/Solicitudes']);
    }
    public function motivo(Request $request) {
        if(isset($request->data)){
        $motivos =[["BAJO RENDIMIENTO EN CURSOS DE CIENCIAS BASICAS", "BAJO RENDIMIENTO EN CURSOS DE LA CARRERA", "BAJO RENDIMIENTO EN GENERAL", "BAJO RENDIMIENTO POR INASISTENCIAS"],
        ["CAMBIO DE CARRERA OTRA UNIVERSIDAD", "CAMBIO MISMA CARRERA OTRA UNIVERSIDAD"],
        ["CAMBIO CARRERA UCT", "REINGRESA MISMA CARRERA VIA PSU UCT"],
        ["DISCONFORMIDAD ACADEMICOS", "DISCONFORMIDAD ATENCION ADMINISTRATIVOS DE LA CARRERA", "DISCONFORMIDAD CON ITIRENARIO FORMATIVO", "DISCONFORMIDAD GESTION DE LA CARRERA (DIRECTOR)", "DISCONFORMIDAD INFRAESTRUCTURA"],
        ["DISCONFORMIDAD AMBIENTE UNIVERSITARIO", "DISCONFORMIDAD ATENCION ADMINISTRATIVOS DE LA UNIVERSIDAD", "DISCONFORMIDAD MOVILIZACIONES ESTUDIANTILES", "DISCONFORMIDAD TRAMITES BUROCRATICOS"],
        ["PROBLEMAS ECONOMICOS", "PROBLEMAS LABORALES"],
        ["CUIDADO DE HIJOS", "EMBARAZO"],
        ["OTROS"],
        ["OTROS PROBLEMAS PERSONALES", "SERVICIO MILITAR"],
        ["DISCAPACIDAD", "PROBLEMAS DE SALUD", "PROBLEMAS DE SALUD DE FAMILIARES", "PROBLEMAS PSICOLOGICOS Y/O PSIQUIATRICOS"],
        ["TRASLADO DE CIUDAD","TRASLADO DE PAIS", "TRASLADO DE REGION"],
        ["VOCACION"]
        ];
    if ($request->data == "ACADEMICO"){
        $lista = $motivos[0];
    }
    if ($request->data == "CAMBIO DE UNIVERSIDAD"){
        $lista = $motivos[1];
    }
    if ($request->data == "CAMBIO INTERNO UCT"){
        $lista = $motivos[2];
    }
    if ($request->data == "DISCONFORMIDAD CARRERA"){
        $lista = $motivos[3];
    }
    if ($request->data == "DISCONFORMIDAD UNIVERSIDAD"){
        $lista = $motivos[4];
    }
    if ($request->data == "ECONOMICOS"){
        $lista = $motivos[5];
    }
    if ($request->data == "HIJOS"){
        $lista = $motivos[6];
    }
    if ($request->data == "OTROS"){
        $lista = $motivos[7];
    }
    if ($request->data == "PERSONALES"){
        $lista = $motivos[8];
    }
    if ($request->data == "SALUD"){
        $lista = $motivos[9];
    }
    if ($request->data == "TRASLADO"){
        $lista = $motivos[10];
    }
    if ($request->data == "VOCACION"){
        $lista = $motivos[11];
    }
    return response()->json([
        'lista' => $lista,
        'success' => true
    ]);
    }else{
    return response()->json([
        'success' => false
    ]);
}  
}
public function solicitud(Request $request)
    {
    if(auth()->user()){
        $record = $request->record;
        $tipo = $request->tipo;
        $motivo1 = $request->motivo1;
        $motivo2 = $request->motivo2;
        $detalle = $request->detalle;
        $año = $request->año;
        $semestre = $request->semestre;
        $fecha = $request->fecha;

        if ($new = Solicitud::create([
        'user'=> $record,
        'Tipo'=> $tipo,
        'Año'=> $año,
        'Semestre'=> $semestre,
        'Motivo1'=> $motivo1,
        'Motivo2'=> $motivo2,
        'Detalle'=> $detalle,
        'Fecha' => $fecha
        ])){
            return "Solicitud Enviada";
        }else{
            return "ERROR";  
        }
        return "Sesion no iniciada";
    }
}
}
