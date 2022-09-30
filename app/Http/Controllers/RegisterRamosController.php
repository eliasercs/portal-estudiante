<?php      

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ramos;

class RegisterRamosController extends Controller
{
    public function create(){
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

