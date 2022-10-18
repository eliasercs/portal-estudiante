<?php      

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'rut'  => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create(request(['name','rut', 'email', 'password']));

        if (is_null($user->AcademicRecord)) {
            return redirect()->to("/estudiante/matricular");
        }

        auth()->login($user);
        return redirect()->to('/');
    }
}

