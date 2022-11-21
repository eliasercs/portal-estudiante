<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class SessionController extends Controller
{

    public $bootstrap = True;

    public function create(){
        if (auth()->check()) {
            $user = auth()->user();
            if (is_null($user->AcademicRecord)) {
                return redirect()->to("/estudiante/matricular");
            }
        } else {
            return view('auth.login', ['bootstrap' => $this->bootstrap]);
        }
    }
    public function store() {
        
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->with('status', 'error');

        } else {
            $user = auth()->user();
            if(auth()->user()->role == 'admin') {
                return redirect()->route('admin.index')->with('status', 'success');
            } else {
                if (is_null($user->AcademicRecord)) {
                    return redirect()->to("/estudiante/matricular");
                }
                return redirect()->to('/home')->with('status', 'success');
            }
        }
    }


    public function destroy() {
        $user = auth()->user();

        auth()->logout();

        return redirect()->to('/');
    }
}

