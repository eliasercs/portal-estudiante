<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Hash;
use Auth;

class UserSettingsController extends Controller
{
    public function changePasswordPost(Request $request) {
        # Validation
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed|min:8|',
        ]);

        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->with('status', 'error');

        } else {
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => bcrypt($request->new_password)
            ]);

            return redirect()->to('/home')->with('change', 'success');
        
        }
    }

    public function changePasswordNoAuth(Request $request) {
        $regex = ["/[A-Z]{1}/","/[0-9]{1}/","/[a-z]{1}/","/.{8}/","/\.{1}/",
            "/(?:[áéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕçÇ: \!\¡\"\#\$\%\&\/\(\)\=\?\¡\'\¿\/\´\¨\+\*\/\{\}\[\]\^\~\-\;])/"        
        ];

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required'
        ]);

        $new_password = $request["new_password"];
        $new_password_confirmation = $request["new_password_confirmation"];

        // Encontrar al usuario a través del correo.
        $user = DB::table('users')
            ->where('email',$request["email"])
            ->first();
       
        if (isset($user)) {
            if (password_verify($request["password"], $user->password)) {
                // Si no encuentra por lo menos un carácter en mayúscula
                if (preg_match($regex[0],$request["new_password"])==0 and preg_match($regex[0],$request["new_password_confirmation"])==0) {
                    return back()->with("change", "upper_error");
                }
                // Si no encuentra por lo menos un carácter numérico
                elseif (preg_match($regex[1],$request["new_password"])==0 and preg_match($regex[1],$request["new_password_confirmation"])==0) {
                     return back()->with("change", "number_error");
                }
                // Si no encuentra por lo menos un carácter en minúscula
                elseif (preg_match($regex[2],$request["new_password"])==0 and preg_match($regex[2],$request["new_password_confirmation"])==0) {
                    return back()->with("change", "lower_error");
                }
                // Si la longitud de las contraseñas es inferior a 8
                elseif (preg_match($regex[3],$request["new_password"])==0 and preg_match($regex[3],$request["new_password_confirmation"])==0) {
                    return back()->with("change", "len_error");
                }
                // Si las contraseñas no consideran incluir por lo menos un punto
                elseif (preg_match($regex[4],$request["new_password"])==0 and preg_match($regex[4],$request["new_password_confirmation"])==0) {
                    return back()->with("change", "point_error");
                }
                // Si en las contraseñas se encuentran carácteres especiales
                elseif (preg_match($regex[5],$request["new_password"])==1 and preg_match($regex[5],$request["new_password_confirmation"])==1) {
                    return back()->with("change", "symbol_error");
                } else if ($new_password != $new_password_confirmation) {
                    return back()->with("status", "password_validation_error");
                } else if ($new_password == $new_password_confirmation) {
                    DB::table('users')->update(['password' => bcrypt($new_password)]);
                    DB::commit();
                    return back()->with("change", "success");
                }
            } else {
                return back()->with("status", "current_password_error");
            }
        } else {
            return back()->with("status", "user_email_error");
        }
        
    }
}