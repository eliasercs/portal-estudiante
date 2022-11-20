<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\AcademicRecord;
use App\Models\Carrera;

use App\Models\Ramo;
use App\Models\Seccion;

// Este es un controlador para probar las entidades creadas

class EntidadController extends Controller
{
    public function checkUser($user_id) {
        $user = User::where('id', intval($user_id))->first();
        $reg = $user->AcademicRecord;
        return is_null($reg->Carrera->Curso);
    }

    public function checkAcademicRecord($user_id) {
        $user = User::where('id', $user_id)->first();
        return $user->AcademicRecord;
    }

    public function checkCarrera($user_id) {
        $user = User::where('id', $user_id)->first();
        $registro = $user->AcademicRecord;
        return $registro->Carrera;
    }

    public function createCursoView() {
        $carreras = Carrera::all();
        return view('Curso.create',['carreras' => $carreras]);
    }

    public function createCurso(Request $request) {
        $data = $request->validate([
            'code' => 'required',
            'nombre' => 'required',
            'creditos' => 'required',
            'tipo' => 'required',
            'carrera' => 'required',
        ]);

        $search_course = Ramo::where('code', $request['code'])->get();

        $carrera = Carrera::where('id', intval($data['carrera']))->get()->first();

        $value = ['code' => $data['code'],
            'nombre' => $data['nombre'],
            'creditos' => $data['creditos'],
            'tipo' => $data['tipo']];

        if (count($search_course) == 0) {
            $new_curse = new Ramo($value);
            if ($data["carrera"] != "default") {
                $new_curse->Carrera()->associate($carrera);
                $new_curse->save();
                return redirect()->route("nueva_seccion", ['id' => $new_curse->id]);
            }
            $new_curse->save();
            return view('Curso.create_seccion', ['curso' => $new_curse]);
        }
    }

    public function createSeccionView($curso_id) {
        $curso = Ramo::where('id',$curso_id)->first();
        return view('Curso.create_seccion', ['curso' => $curso, 'curso_id' => $curso_id]);
    }

    public function newSeccion(Request $request) {
        $data = $request->validate([
            'code' => 'required',
            'seccion' => 'required',
            'profesor' => 'required',
            'horario' => 'required',
            'sala' => 'required',
            'capacidad' => 'required',
        ]);

        $curso = Ramo::where('code', $data['code'])->first();

        return $curso;

        /*
        $values = [
            'numero' => $data['seccion'],
            'profesor' => $data['profesor'],
            'horario' => $data['horario'],
            'sala' => $data['sala'],
            'capacidad' => $data['capacidad'],
            'inscritos' => 0,
        ];

        $seccion = new Seccion($values);
        $seccion->Curso()->associate($curso);
        $seccion->save();

        return $seccion;
        */
    }

    public function AddNewSection(Request $request) {

        $data = $request->validate([
            'code' => 'required',
            'seccion' => 'required',
            'profesor' => 'required',
            'horario' => 'required',
            'sala' => 'required',
            'capacidad' => 'required',
            'curso_id' => 'required',
        ]);

        $curso = Ramo::find($data['curso_id']);

        $values = [
            'numero' => $data['seccion'],
            'sigla' => $data['code'],
            'profesor' => $data['profesor'],
            'horario' => $data['horario'],
            'sala' => $data['sala'],
            'capacidad' => $data['capacidad'],
            'inscritos' => 0,
        ];

        $seccion = new Seccion($values);
        $seccion->Curso()->associate($curso);
        
        $ref = "/testing/cursos/seccion/new/curso_id={$data['curso_id']}";
        if ($seccion->save()) {
            $response = "Sección creada satisfactoriamente.";
            $img = "/img/confirm.svg";
            return view("Error.permiso", ['ref' => $ref, 'response' => $response, 'img' => $img]);
        } else {
            $response = "Esta sección ya existe.";
            $img = "/img/error.svg";
            return view("Error.permiso", ['ref' => $ref, 'response' => $response, 'img' => $img]);
        }

    }
}
