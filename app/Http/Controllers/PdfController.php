<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RamosController;
use Illuminate\Http\Request;




class PdfController extends Controller
{
    # funcion ficha de avance academico
    function FAC(string $id)
    {
        $ramos = new RamosController();
        $cursos = $ramos->get_Cursos($id);
        #se crea la variale cargando una vista blade
        $pdf = \PDF::loadView('PDF', ["cursos" => $cursos]);
        return $pdf->download('FAC.pdf');
    }
}
