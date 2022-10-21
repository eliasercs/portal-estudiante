<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ramos;
use App\Models\User;
use App\Models\inscripcion;
use DB;

class AcademicaController extends Controller
{
    public function index()
    {
        $Actual = auth()->user()->AcademicRecord->InscripcionCurso;
        $data = [];
        foreach ($Actual as $key => $value) {
            $data[$key] = [
                "fecha" => $value->fecha,
                "Curso" => $value->Seccion->Curso->nombre,
                "Sigla" => $value->Seccion->Curso->code,
                "Creditos" => $value->Seccion->Curso->creditos,
                "Tipo" => $value->Seccion->Curso->tipo,
                "Seccion" => $value->Seccion->numero,
                "Profesor" => $value->Seccion->profesor,
                "Horario" => $value->Seccion->horario,
                "Sala" => $value->Seccion->sala,
                "Capacidad" => $value->Seccion->capacidad,
                "Inscritos" => $value->Seccion->inscritos,
                "Cid" => $value ->Seccion->Curso->id,
                "Sid" => $value ->id,
            ];
        }
        //$ramos = DB::table('ramos')->paginate(10); 
   
        $user = user::where('id', auth()->user()->id)->first();
        
        $inscripcion = inscripcion::where('rut', $user->rut)->get();

        $code_cursos = $inscripcion->pluck('curso')->toArray();
        
        $ramos = ramos::whereIn('code', $code_cursos)->paginate(10);
        
                
        return view('auth.view-academica')->with(['ramos' => $ramos]);

        

        
    }

}
