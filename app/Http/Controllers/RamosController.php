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
        $ramos = ramos::join('seccion', 'ramos.code', '=', 'seccion.curso')
        ->select('code','nombre','numero','profesor','horario','sala','capacidad','inscritos','id')
        ->paginate(10);
        return view('auth.inscripcion', compact('ramos'));
    }

    public function create() {
        $usuario = auth()->user()->rut;
        #no funciona, al parecer devuelve una consulta en vez del dato que necesito 
        #necesito obtener el id del registro academico del usuario que esta logeado
        $registro = DB::table('curso_inscrito')->select('id')->where('rut', '=', $usuario);
        $ramos = ramos::join('curso_inscrito', 'ramos.code', '=', 'curso_inscrito.curso')
            ->select('name','code','profesor','cupos')
            ->where('curso_inscrito.registro', '=', $registro)
            ->paginate(10);
        return view('auth.ramos', compact('ramos'));
    }

    public function store($code){
        $usuario = auth()->user()->rut;
        $registro = DB::table('curso_inscrito')->select('id')->where('rut', '=', $usuario);
        DB::table('curso_inscrito')->insert([
            ['registro' => $registro, 'seccion' => $code]
        ]);
        return redirect()->route("cursos.index");
    }

    public function destroy($code)
    {
        $usuario = auth()->user()->rut;
        $registro = DB::table('curso_inscrito')->select('id')->where('rut', '=', $usuario);
        DB::table('curso_inscrito')->where('rut', '=', $usuario)->where('curso', '=', $code)->delete();

        return redirect()->route("cursos.index");
    }

}
