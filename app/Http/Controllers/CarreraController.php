<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carrera;

class CarreraController extends Controller
{
    public function create_view() {
        return view("Carrera.create");
    }

    public function create_carrera(Request $request) {
        $data = $request->validate([
            'nombre' => 'required'
        ]);
        $search = Carrera::where('nombre',$data["nombre"])->get();

        if (count($search)==0) {
            $carrera = Carrera::create($data);
            
            if (isset($carrera)){
                echo "Exito";
                
            } else {
                echo "False";
                
            }
        } else {
            echo "Esta carrera ya existe";
            return redirect()->to('/');
        }
    }

    public function show_carreras() {
        return Carrera::all();
    }
}
