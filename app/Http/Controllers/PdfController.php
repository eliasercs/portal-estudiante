<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RamosController;
use Illuminate\Http\Request;





class PdfController extends Controller
{

    public function view() {
        $academic_record = auth()->user()->AcademicRecord;
        $route = "/descargaFAC";
        $bootstrap = true;
        return view('Carrera.select',['Academic_Records' => $academic_record, 'route' => $route, 'bootstrap' => $bootstrap]);
    }

    # funcion ficha de avance academico
    function FAC(string $id)
    {
        $ramos = new RamosController();
        $cursos = $ramos->get_Cursos($id);
        #se crea la variale cargando una vista blade
        $pdf = PDF::loadView('PDF', ["cursos" => $cursos]);
        return $pdf->download('FAC.pdf');
    }

    function create(Request $request)
    {
        $ramos = new RamosController();
        $cursos = $ramos->get_Cursos($request->data);
        #se crea la variale cargando una vista blade
        $pdf = \PDF::loadView('PDF', ["cursos" => $cursos]);
        return $pdf->download('FAC.pdf');
    }
}
