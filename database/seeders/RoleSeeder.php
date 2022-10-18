<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $profesor = Role::create([
            'name' => 'profesor',
            'description' => 'Profesor de la universidad'
        ]);
        $alumno = Role::create([
            'name' => 'alumno',
            'description' => 'Alumno de la universidad'
        ]);

        premission::create(['name' => 'admin.notas'])->syncRoles([$profesor]);

        
    }
}
