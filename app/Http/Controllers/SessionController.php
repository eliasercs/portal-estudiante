<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store() {
        
        if(auth()->attempt(request(['rut', 'password'])) == false) {
            return back()->with('status', 'error');

        } else {

            if(auth()->user()->role == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->to('/');
            }
        }
    }

    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }
}

