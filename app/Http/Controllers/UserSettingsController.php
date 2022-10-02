<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Hash;
use Auth;

class UserSettingsController extends Controller
{
    public function changePasswordPost(Request $request) {
        # Validation
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->with('status', 'error');

        } else {
            if('new_password' != 'new_password_confirmation') {
                return back()->with('change', 'password_error');
            }
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => bcrypt($request->new_password)
            ]);

            return back()->with("change", "suscess");
        
        }
    }

    public function changePasswordNoAuth(Request $request) {
        $regex = ["/[A-Z]{1}/","/[0-9]{1}/","/[a-z]{1}/","/.{8}/","/\.{1}/",
            "/(?:[áéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ: \!\¡\"\#\$\%\&\/\(\)\=\?\¡\'\¿\/\´\¨\+\*\/\{\}\[\]\^\~\-\;])/"        
        ];

        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required'
        ]);

        if (preg_match($regex[0],$request["new_password"])==0 and preg_match($regex[0],$request["new_password_confirmation"])==0) {
            return back()->with("change", "upper_error");
        }
        elseif (preg_match($regex[1],$request["new_password"])==0 and preg_match($regex[1],$request["new_password_confirmation"])==0) {
            return back()->with("change", "number_error");
        }
        elseif (preg_match($regex[2],$request["new_password"])==0 and preg_match($regex[2],$request["new_password_confirmation"])==0) {
            return back()->with("change", "lower_error");
        }
        elseif (preg_match($regex[3],$request["new_password"])==0 and preg_match($regex[3],$request["new_password_confirmation"])==0) {
            return back()->with("change", "len_error");
        }
        elseif (preg_match($regex[4],$request["new_password"])==0 and preg_match($regex[4],$request["new_password_confirmation"])==0) {
            return back()->with("change", "point_error");
        }
        elseif (preg_match($regex[5],$request["new_password"])==1 and preg_match($regex[5],$request["new_password_confirmation"])==1) {
            return back()->with("change", "symbol_error");
        }
    }
}