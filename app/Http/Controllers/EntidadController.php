<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\AcademicRecord;
use App\Models\Carrera;

// Este es un controlador para probar las entidades creadas

class EntidadController extends Controller
{
    public function checkUser($user_id) {
        return User::where('id', intval($user_id))->first();
    }

    public function checkAcademicRecord($user_id) {
        $user = User::where('id', $user_id)->first();
        return $user->AcademicRecord;
    }

    public function checkCarrera($register_id) {
        $user = User::where('id', $user_id)->first();
        $registro = $user->AcademicRecord;
        return $registro->Carrera;
    }
}
