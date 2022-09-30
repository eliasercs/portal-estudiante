<?php

namespace App\Http\Controllers;

use App\Models\ramos;
use Illuminate\Http\Request;

class RamosController extends Controller
{
    
    public function index()
    {
        //pagina de inicio 
        $ramos = ramos::orderBy('id', 'desc')->paginate(3);
        return view('auth.ramos', compact('ramos'));
    }


}
