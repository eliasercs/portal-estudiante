<?php

namespace App\Http\Controllers;

use App\Models\Ramo;
use App\Models\inscripcion;
use Illuminate\Http\Request;
use DB;
use Auth;

use App\Models\CursoInscrito;
use App\Models\Seccion;

class RamosController extends Controller
{
    public function index()
    {
        //pagina de inicio 
        $ramos = Ramo::join('secciones', 'ramos.id', '=', 'secciones.curso_id')
            ->select('code','nombre','numero','profesor','horario','sala','capacidad','inscritos','secciones.id')
            ->paginate(10);
        //return $ramos;    
        return view('auth.inscripcion', compact('ramos'));
    }

    public function create() {
        
        /*
        $cursos retorna una lista con todos los cursos inscritos por el estudiante
        */
        $cursos = auth()->user()->AcademicRecord->InscripcionCurso;
        $data = [];
        foreach ($cursos as $key => $value) {
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
            ];
        }
        return $data;
        #no funciona, al parecer devuelve una consulta en vez del dato que necesito 
        #necesito obtener el id del registro academico del usuario que esta logeado
        /*
        $registro = DB::table('curso_inscrito')->select('id')->where('rut', '=', $usuario);
        echo isset($registro);
        if (DB::table('curso_inscrito')->where('registro', '=', $registro)->where('curso', '=', 'INFO1128')->exists()) {
            return redirect()->route('ramos.index')->with('status', 'curso_repetido');
        } else {
            #si hay 0 cupos disponibles marca como cursos agotados, (en la bd solo hay total y inscritos, por lo que hay que modificarlo)
            if (DB::table('seccion')->where('cupos', '=', 0)->where('code', '=', 'INFO1128')->exists()) {
                return redirect()->route('ramos.index')->with('status', 'cupos_agotados');
            } else {
                DB::table('curso_inscrito')->insert([
                    ['registro' => $registro, 'curso' => 'INFO1128']
                ]);
                #si se inscribe el curso se añade uno a los inscritos
                DB::table('seccion')->where('id', '=', 'INFO1128')->increment('inscritos');
                return redirect()->route("cursos.index")->with('status', 'curso_agregado');
            }
        }
        return view('auth.ramos', compact('ramos'));
    }

    public function store(Request $request){

        $req = $request->all();

        $usuario = auth()->user()->AcademicRecord;
        
        $id = $req["seccion_id"];

        $seccion = Seccion::find($id);

        $curso_inscrito = new CursoInscrito();
        $curso_inscrito->AcademicRecord()->associate($usuario);
        $curso_inscrito->Seccion()->associate($seccion);
        $curso_inscrito->save();

        return $curso_inscrito;


        /*$registro = DB::table('curso_inscrito')->select('id')->where('rut', '=', $usuario);
        if (isset($registro)) {
            DB::table('curso_inscrito')->insert([
                ['registro' => $registro, 'seccion' => intval($code)]
            ]);
            #si se elimina el curso se le resta uno a los inscritos
            DB::table('seccion')->where('id', '=', intval($code))->decrement('inscritos');
            return redirect()->route("cursos.index");
        } else {
            echo "Error";
        }

    }

    public function destroy($code)
    {
        /*
        $usuario = auth()->user()->rut;
        $registro = DB::table('curso_inscrito')->select('id')->where('rut', '=', $usuario);
        DB::table('curso_inscrito')->where('rut', '=', $usuario)->where('curso', '=', $code)->delete();

        return redirect()->route("cursos.index");
        */
    }

}
