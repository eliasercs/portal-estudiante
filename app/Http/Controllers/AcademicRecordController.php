<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carrera;
use App\Models\AcademicRecord;
use App\Models\User;

class AcademicRecordController extends Controller
{
    public function create_view() {
        $carreras = Carrera::all();
        return view("AcademicRecord.create",['carreras' => $carreras]);
    }

    public function enroll(Request $request) {
        $data = $request->validate([
            'rut' => 'required',
            'carrera' => 'required',
            'situacion' => 'required',
            'ingreso' => 'required',
            'plan' => 'required',
        ]);

        $carrera = Carrera::where('id', $data['carrera'])->first();

        $user = User::where('rut', $data['rut'])->get();
        
        echo count($user);

        if (count($user)==0) {
            echo "Usuario no encontrado";
        } else {
            $res = ['plan' => $data['plan'],
                'ingreso' => $data['ingreso'],
                'situacion' => $data['situacion']];
            $reg = new AcademicRecord($res);
            // Asociar registros
            $reg->Carrera()->associate($carrera);
            $reg->User()->associate($user[0]);
            $reg->save();
            return "Exito";
        }
    }
}
