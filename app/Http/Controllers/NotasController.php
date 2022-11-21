<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Inscripcion;
use App\Models\Ramo;
use App\Models\User;
use DB;

class NotasController extends Controller
{
    public function index(Request $request,String $curso_id)
    {
        $usuario = auth()->user()->rut;;
        $curso = Ramo::find($curso_id);
    	$notas = Nota::orderBy('id', 'DESC')
            ->where('rut_alumno', '=', $usuario)
            ->where('curso_id', '=', $curso->id)
    		->paginate(10);
        return view('Notas.notas', compact('notas'));
    }

    public function creadorNotas()
    {
        return view('Notas.poner-nota');
    }

    public function PonerNota(Request $request)
    {
        $usuario = $request->get('usuario');
        $curso = $request->get('curso');
        $nota = $request->get('nota');
        $porcentaje = $request->get('porcentaje');
        DB::table('notas')->insert([
            ['rut_alumno' => $usuario,
            'curso_id' => $curso,
            'nota' => $nota,
            'porcentaje' => $porcentaje,]
        ]);
        return "Nota agregada satisfactoriamente";

    }


}


