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
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => bcrypt($request->new_password)
            ]);

            return redirect()->to('/home')->with("change", "suscess");
        
        }
    }
}