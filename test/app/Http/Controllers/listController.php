<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class listController extends Controller
{
    public function index() {
        $query = DB::table('dbo.testUser')
        ->get();
        return view('index',['listado'=>$query]);
    }
}
