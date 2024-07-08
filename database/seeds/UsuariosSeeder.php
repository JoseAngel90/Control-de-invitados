<?php

use Illuminate\Database\Seeder;
use App\user;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{

    User::truncate();

    User::create([
        'name' => 'Administrador',
        'email' => 'admin@example.com',
        'password' => bcrypt('123'),
        'rol_id' => 1,
    ]);

    User::create([
        'name' => 'Registrante',
        'email' => 'registrante@example.com',
        'password' => bcrypt('contraseña'),
        'rol_id' => 2,
    ]);

    User::create([
        'name' => 'Vigilancia',
        'email' => 'vigilancia@example.com',
        'password' => bcrypt('contraseña'),
        'rol_id' => 3,
    ]);
}    
}

