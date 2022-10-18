<?php

namespace App\Http\Controllers;

use App\Models\Ramo;
use App\Models\inscripcion;
use Illuminate\Http\Request;
use DB;
use Auth;

use App\Models\CursoInscrito;
use App\Models\Seccion;
use App\Models\History_course;

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
            if(date("m", strtotime($value->fecha))<7){
                $semestre = 1;
            }
            else{
                $semestre = 2;
            };
            $data[$key] = [
                "id" => $value->id,
                "Año" => date("Y", strtotime($value->fecha)),
                "Semestre" => $semestre,
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
        $record = [];
        if (auth()->user()->AcademicRecord->History){
            foreach (auth()->user()->AcademicRecord->History as $key => $value) {
                $record[$key] = [
                    "Año" => $value->Año,
                    "Semestre" => $value->Semestre,
                    "Curso" => $value->Curso,
                    "Sigla" => $value->Sigla,
                    "Creditos" => $value->Creditos,
                    "Nota" => $value->Nota,
                ];
            }
        }
        return view('auth.view-academica')->with(['ramos' => $data, 'record' => $record]);
    }
    
    public function store(Request $request){
        $req = $request->all();

        $id = $req["seccion_id"];
        $usuario = auth()->user()->AcademicRecord;
        $seccion = Seccion::find($id);
        $cursos = auth()->user()->AcademicRecord->InscripcionCurso;
        #devuelve el id de los cursos que ya estan inscritos
        $inscritos = [];
        foreach ($cursos as $key => $value) {
            array_push($inscritos,$value->Seccion->Curso->id);
        }
        #devuelve el id de las secciones del curso que esta inscrito, tuve que ir y volver para obtener dicho dato
        $Sinscrito = [];
        foreach ($seccion->Curso->Seccion as $key => $value) {
            array_push($Sinscrito,$value->id);
        }
        if ($seccion->inscritos <= $seccion->capacidad) { #si hay espacio
            if ($seccion->Curso->creditos <= $usuario->creditos) { #si hay creditos disponibles
                if(in_array($seccion->Curso->id, $inscritos)){ #si ya lo ha inscrito en otra seccion lo elimina
                    $select = CursoInscrito::Select('id')->whereIn('seccion_id',$Sinscrito)->get();
                    $SeccionAntigua = CursoInscrito::find($select)[0]->Seccion;
                    $eliminar = CursoInscrito::destroy($select);
                    $SeccionAntigua->inscritos = $SeccionAntigua->inscritos - 1;
                    $SeccionAntigua->save();
                    $usuario->creditos = $usuario->creditos + $seccion->Curso->creditos;
                    $usuario->save(); 

                }
                #inscribe la nueva seccion
                $curso_inscrito = new CursoInscrito();
                $curso_inscrito->AcademicRecord()->associate($usuario);
                $curso_inscrito->Seccion()->associate($seccion);
                $curso_inscrito->save();
    
                $seccion->inscritos = $seccion->inscritos + 1;
                $usuario->creditos = $usuario->creditos - $seccion->Curso->creditos;
                $usuario->save();
                $seccion->save();
                return "Curso inscrito satisfactoriamente"; #hay que cambiarlo por una alerta y que esta actualice la pagina
            }
    
            return "Creditos insfucientes";
        } else {
            return "No quedan cupos disponibles para esta sección";
        }
    }


    public function destroy(Request $request)
    {
        $cantidad_cursos = count(CursoInscrito::all());
        $student = auth()->user()->AcademicRecord;
        $curso = CursoInscrito::find($request['curso_id']);

        $seccion = Seccion::find($curso->seccion_id);

        if ($cantidad_cursos>1) {
            if ($curso->delete()) {
                $seccion->inscritos = $seccion->inscritos - 1;
                $seccion->save();
                $student->creditos = $student->creditos + $seccion->Curso->creditos;
                $student->save();
                return "El curso ha sido eliminado satisfactoriamente";
            } else {
                return "Ha ocurrido un error al eliminar el curso";
            }
        } else {
            return "No podemos eliminar este curso.";
        }
        
    }

    public function inscribirSectionView(Request $request) {
        $id = [];
        $usuario = auth()->user()->AcademicRecord->InscripcionCurso;
        foreach ($usuario as $key => $value) {
            array_push($id,$value->Seccion->id);
        }
        $curso = Ramo::find($request["curso_id"]);
        $secciones = $curso->Seccion;

        return view('Curso.inscribir_seccion', ['curso' => $curso, 'secciones' => $secciones, 'inscrito'=> $id]);
    }

    public function deleteCourseView(Request $request) {
        $cursos = $this->create();
        return view("Curso.delete_course", ['cursos' => $cursos]);
    }

}
