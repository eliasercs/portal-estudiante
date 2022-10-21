<?php

namespace App\Http\Controllers;
use App\Http\Controllers\RamosController;
use PDF;



use Illuminate\Http\Request;

class GeneradorController extends Controller
{

    public function imprimir()

    {
        $ramos=new RamosController();
        #$ramos->create();
        $cursos=$ramos->get_Cursos();
        $pdf = \PDF::loadView('cursosinscritos',["cursos"=>$cursos]);
        return $pdf->download('cursosinscritos.pdf');

    }
}
