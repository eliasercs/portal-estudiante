<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\AcademicRecord;

class AcademicRecordController extends Controller
{
    public function create() {
        return view("AcademicRecord.create");
    }

    public function enroll() {
        $this->validate(request(), [
            'email' => 'required',
            'carrera'  => 'required',
            'situacion' => 'required',
            'ingreso' => 'required',
            'plan' => 'required'
        ]);

        $request = request(['email']);

        $new_record = request(['carrera', 'plan', 'ingreso', 'situacion']);

        $user = User::where('email',$request["email"])->first();

        if (isset($user)) {
            $record = new AcademicRecord($new_record);
            $record->User()->associate($user);
            $record->save();
            return redirect()->to('/matricular')->with('status', 'success');
        } else {
            return redirect()->to('/matricular')->with('status', 'error');
        }
    }
}
