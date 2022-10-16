<?php

namespace App\Http\Controllers;

use App\Models\ramos;
use App\Models\inscripcion;

use Illuminate\Http\Request;

class InscripcionController extends Controller
{
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
