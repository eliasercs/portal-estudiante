<?php      

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ramo;

class RegisterRamosController extends Controller
{
    public function create(){
        return view('auth.register-ramos');
    }

    public function store() {

        $this->validate(request(), [
            'nombre' => 'required',
            'code' => 'required',
            'creditos' => 'required',
            'tipo' => 'required',
            'carrera' => 'required',
        ]);

        $ramos = Ramo::create(request(['nombre', 'code', 'creditos', 'tipo', 'carrera']));

        return redirect()->to('/');
    }
}

