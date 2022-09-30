<?php

namespace App\Http\Controllers;

use App\Models\ramos;
use App\Models\inscripcion;

use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function create() {
        $usuario = auth()->user()->rut;
        $ramos = ramos::join('inscripcion', 'ramos.code', '=', 'inscripcion.curso')
            ->select('name','code','profesor','cupos')
            ->where('inscripcion.rut', '=', $usuario)
            ->paginate(10);
        #$listado = DB::table('dbo.inscripcion')->select('code')->where('rut', '=', '10')->paginate(3);
        #$ramos = DB::table('dbo.ramos')->select('name','code','profesor','cupos')->where('code','=',$listado)->paginate(3);
        #->where('code','=',$listado)
        return view('auth.ramos', compact('ramos'));
        #return view('auth.inscripcion',['ramos'=>$ramos]);
    }

    public function form(){
        return view('auth.register-ramos');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'code' => 'required',
            'profesor' => 'required',
            'cupos' => 'required',
        ]);

        $ramos = ramos::create(request(['name', 'code', 'profesor', 'cupos']));

        return redirect()->to('/');
    }
}
