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
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with("change", "suscess");
        
        }
    }
}