<?php

namespace App\Http\Controllers;
use App\Http\Controllers\RamosController;
use PDF;



use Illuminate\Http\Request;

class GeneradorController extends Controller
{

    public function imprimir(string $id)

    {
        $ramos=new RamosController();
        #$ramos->create();
        $cursos=$ramos->get_Cursos($id);
        $pdf = \PDF::loadView('cursosinscritos',["cursos"=>$cursos]);
        return $pdf->download('cursosinscritos.pdf');

    }
}
