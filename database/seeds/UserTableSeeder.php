<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Rol;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin =Rol::where('nombre', 'admin')->first();
        $rolMedico =Rol::where('nombre', 'medico')->first();
        $rolPaciente =Rol::where('nombre', 'paciente')->first();


        $admin = User::create([
            'name' => 'Usuario Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Administrador')
        ]);

        $medico = User::create([
            'name' => 'Usuario Medico',
            'email' => 'Medico@gmail.com',
            'password' => Hash::make('Medico')
        ]);

        $paciente = User::create([
            'name' => 'Usuario Paciente',
            'email' => 'Paciente@gmail.com',
            'password' => Hash::make('Paciente')
        ]);

        $admin->roles()->attach($rolAdmin);
        $medico->roles()->attach($rolMedico);
        $paciente->roles()->attach($rolPaciente);
    }
}