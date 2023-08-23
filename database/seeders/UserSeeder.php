<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds
     * 
     * @return void
     */

     public function run()
     {

        User::create([
            'name' => 'Sara',
            'apellido' => 'Arias Londoño',
            'telefono' => '33333333333',
            'email' => 'ejemplo@jotamundial.com',
            'password' => bcrypt('123456789'),
            'date' => '2004-12-02', 
            'cargo' => 'Practicante',
            'area' => 'Sistemas',
        ])->assignRole('Admin');

        User::factory(9)->create();
     }

}