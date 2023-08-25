<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear usuarios normales
        User::factory(10)->create();

        // Llamar al método para crear el usuario administrador
        $this->runAdmin();
    }

    /**
     * Crear un usuario administrador.
     *
     * @return void
     */
    public function runAdmin()
{
    User::create([
        'name' => 'Admin User',
        'apellido' => 'Ejemplo',
        'telefono' => '3333333333',
        'date'=>'2023-08-24',
        'cargo'=>'Practicante',
        'area'=>'Sistemas',
        'email' => 'admin@example.com',
        'password' => Hash::make('adminpassword'),
    ])->assignRole('Admin');

    User::factory(9)->create();
}
}