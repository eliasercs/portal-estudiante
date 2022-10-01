<?php

namespace App\Http\Controllers;

use App\Models\ramos;
use App\Models\inscripcion;
use Illuminate\Http\Request;
use DB;

class RamosController extends Controller
{
    public function index()
    {
        //pagina de inicio 
        $ramos = ramos::orderBy('id', 'desc')->paginate(10);
        return view('auth.inscripcion', compact('ramos'));
    }

    public function create() {
        $usuario = auth()->user()->rut;
        $ramos = ramos::join('inscripcion', 'ramos.code', '=', 'inscripcion.curso')
            ->select('name','code','profesor','cupos')
            ->where('inscripcion.rut', '=', $usuario)
            ->paginate(10);
        return view('auth.ramos', compact('ramos'));
    }

    public function store($code){
        $usuario = auth()->user()->rut;
        DB::table('inscripcion')->insert([
            ['rut' => $usuario, 'curso' => $code]
        ]);
        return redirect()->route("cursos.index");
    }

    public function destroy($code)
    {
        $usuario = auth()->user()->rut;
        DB::table('inscripcion')->where('rut', '=', $usuario)->where('curso', '=', $code)->delete();

        return redirect()->route("cursos.index");
    }

}
