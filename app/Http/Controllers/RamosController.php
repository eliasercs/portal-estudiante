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
        $curso_inscrito = auth()->user()->AcademicRecord->InscripcionCurso;

        $carrera = auth()->user()->AcademicRecord->Carrera->Cursos;
        
        $cursos_inscritos = [];
        foreach ($curso_inscrito as $key => $value) {
            if (!in_array($value->Seccion->sigla, $cursos_inscritos)) {
                array_push($cursos_inscritos,$value->Seccion->sigla);
            }
        }

        $cursos = [];
        foreach ($carrera as $key => $value) {
            if (!in_array($value->code, $cursos_inscritos)) {
                array_push($cursos, [
                    'id' => $value->id,
                    'sigla' => $value->code,
                    'nombre' => $value->nombre,
                    'creditos' => $value->creditos
                ]);
            }
        }
        $inscritos = auth()->user()->AcademicRecord->InscripcionCurso;
        $data = [];
        $creditos = auth()->user()->AcademicRecord->creditos;
        foreach ($inscritos as $key => $value) {
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
            ];
        }

        //pagina de inicio 
        //$ramos = Ramo::join('secciones', 'ramos.id', '=', 'secciones.curso_id')
        //    ->select('code','nombre','numero','profesor','horario','sala','capacidad','inscritos','secciones.id')
        //    ->paginate(10);
        //return $cursos[0]["nombre"];    
        return view('auth.inscripcion', compact('cursos','data','creditos'));
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
        /*
        $CInscrito = [];
        foreach ($cursos->Seccion as $key => $value) {
            if (in_array($cursos,$value->id)) {
                array_push($CInscrito,$value->Seccion->sigla);
            }
        }
        */
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
        */
    }

    public function store(Request $request){
        $req = $request->all();

        $usuario = auth()->user()->AcademicRecord;
        
        $id = $req["seccion_id"];

        $seccion = Seccion::find($id);
        $cursos = auth()->user()->AcademicRecord->InscripcionCurso;
        $registro = auth()->user()->AcademicRecord;

        if ($seccion->inscritos <= $seccion->capacidad) {
            if ($seccion->Curso->creditos <= $registro->creditos) {
                $curso_inscrito = new CursoInscrito();
                $curso_inscrito->AcademicRecord()->associate($usuario);
                $curso_inscrito->Seccion()->associate($seccion);
                $curso_inscrito->save();
    
                $seccion->inscritos = $seccion->inscritos + 1;
                $registro->creditos = $registro->creditos - $seccion->Curso->creditos;
                $registro->save();
                $seccion->save();
                return "Curso inscrito satisfactoriamente";
            }
    
            return "Creditos insfucientes";
        } else {
            return "No quedan cupos disponibles para esta sección";
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

    public function inscribirSectionView(Request $request) {
        $curso = Ramo::find($request["curso_id"]);
        $secciones = $curso->Seccion;
        return view('Curso.inscribir_seccion', ['curso' => $curso, 'secciones' => $secciones]);
    }

}
