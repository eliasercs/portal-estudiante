<?php

namespace App\Http\Controllers;

use App\Models\ramos;
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

    public function store($curso){
        $usuario = auth()->user()->rut;
        DB::table('inscripcion')->insert([
            ['rut' => $usuario, 'curso' => $curso,'created_at'=>getdate(),'updated_at'=>getdate()]
        ]);
        return "xd";
    }
}
