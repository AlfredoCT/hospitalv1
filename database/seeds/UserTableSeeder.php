<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Rol;

class UserTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin =Rol::where('nombre','admin')->first();
        $rolDesarrollador =Rol::where('nombre','desarrolador')->first();
        $rolUsuario =Rol::where('nombre','usuario')->first();

        $admin = User::create([
            'name' => 'Usuario Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('administrador')
        ]);

        $desarrolador = User::create([
            'name' => 'Usuario Desarrolador',
            'email' => 'desarrollador@gmail.com',
            'password' => Hash::make('desarrollador')
        ]);

        $usuario = User::create([
            'name' => 'Usuario general',
            'email' => 'usuario@gmail.com',
            'password' => Hash::make('usuario')
        ]);

        $admin->roles()->attach($rolAdmin);
        $desarrolador->roles()->attach($rolDesarrollador);
        $usuario->roles()->attach($rolUsuario);
    }
}
