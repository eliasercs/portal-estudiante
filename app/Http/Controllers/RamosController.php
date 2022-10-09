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
        if (DB::table('curso_inscrito')->where('registro', '=', $registro)->where('curso', '=', $code)->exists()) {
            return redirect()->route('ramos.index')->with('status', 'curso_repetido');
        } else {
            #si hay 0 cupos disponibles marca como cursos agotados, (en la bd solo hay total y inscritos, por lo que hay que modificarlo)
            if (DB::table('seccion')->where('cupos', '=', 0)->where('code', '=', $code)->exists()) {
                return redirect()->route('ramos.index')->with('status', 'cupos_agotados');
            } else {
                DB::table('curso_inscrito')->insert([
                    ['registro' => $registro, 'curso' => $code]
                ]);
                #si se inscribe el curso se añade uno a los inscritos
                DB::table('seccion')->where('id', '=', $code)->increment('inscritos');
                return redirect()->route("cursos.index")->with('status', 'curso_agregado');
            }
        }
        return view('auth.ramos', compact('ramos'));
    }

    public function store($code){
        $usuario = auth()->user()->rut;
        $registro = DB::table('curso_inscrito')->select('id')->where('rut', '=', $usuario);
        DB::table('curso_inscrito')->insert([
            ['registro' => $registro, 'seccion' => $code]
        ]);
        #si se elimina el curso se le resta uno a los inscritos
        DB::table('seccion')->where('id', '=', $code)->decrement('inscritos');
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
