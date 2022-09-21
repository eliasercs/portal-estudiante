<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;

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



    
    public function forgotPassword(Request $request)
    {         
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? redirect()->to('/')->with('status', __($status))->with('status', 'success')
                    : redirect()->to('/')->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }



    public function destroy() {

        auth()->logout();

        return redirect()->to('/');
    }
}

