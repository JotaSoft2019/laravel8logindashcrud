<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1 = Role::create(['name'=> 'Admin']);
        $role2 = Role::create(['name'=> 'User']);


        Permission::create(['name' => 'admin.home']);


        Permission::create(['name' => 'admin.adn.index']);
        Permission::create(['name' => 'admin.adn.create']);
        Permission::create(['name' => 'admin.adn.edit']);
        Permission::create(['name' => 'admin.adn.destroy']);

        Permission::create(['name' => 'admin.calendario.index']);
        Permission::create(['name' => 'admin.calendario.edit']);
        Permission::create(['name' => 'admin.calendario.create']);
        Permission::create(['name' => 'admin.calendario.destroy']);

        Permission::create(['name' => 'admin.comercial.index']);
        Permission::create(['name' => 'admin.comercial.edit']);
        Permission::create(['name' => 'admin.comercial.create']);
        Permission::create(['name' => 'admin.comercial.destroy']);

        Permission::create(['name' => 'admin.comex.index']);
        Permission::create(['name' => 'admin.comex.edit']);
        Permission::create(['name' => 'admin.comex.create']);
        Permission::create(['name' => 'admin.comex.destroy']);

        Permission::create(['name' => 'admin.contabilidad.index']);
        Permission::create(['name' => 'admin.contabilidad.create']);
        Permission::create(['name' => 'admin.contabilidad.edit']);
        Permission::create(['name' => 'admin.contabilidad.destroy']);

        Permission::create(['name' => 'admin.compras.index']);
        Permission::create(['name' => 'admin.compras.create']);
        Permission::create(['name' => 'admin.compras.edit']);
        Permission::create(['name' => 'admin.compras.destroy']);

        Permission::create(['name' => 'admin.articulo.index']);
        Permission::create(['name' => 'admin.articulo.create']);
        Permission::create(['name' => 'admin.articulo.edit']);
        Permission::create(['name' => 'admin.articulo.destroy']);

        Permission::create(['name' => 'admin.logistica.index']);
        Permission::create(['name' => 'admin.logistica.create']);
        Permission::create(['name' => 'admin.logistica.edit']);
        Permission::create(['name' => 'admin.logistica.destroy']);
        
        Permission::create(['name' => 'admin.gerencia.index']);
        Permission::create(['name' => 'admin.gerencia.create']);
        Permission::create(['name' => 'admin.gerencia.edit']);
        Permission::create(['name' => 'admin.gerencia.destroy']);

        Permission::create(['name' => 'admin.lideres.index']);
        Permission::create(['name' => 'admin.lideres.create']);
        Permission::create(['name' => 'admin.lideres.edit']);
        Permission::create(['name' => 'admin.lideres.destroy']);

        Permission::create(['name' => 'admin.mercadeo.index']);
        Permission::create(['name' => 'admin.mercadeo.edit']);
        Permission::create(['name' => 'admin.mercadeo.create']);
        Permission::create(['name' => 'admin.mercadeo.destroy']);

        Permission::create(['name' => 'admin.reconocimientos.index']);
        Permission::create(['name' => 'admin.reconocimientos.create']);
        Permission::create(['name' => 'admin.reconocimientos.edit']);
        Permission::create(['name' => 'admin.reconocimientos.destroy']);

        Permission::create(['name' => 'admin.seguridadYSalud.index']);
        Permission::create(['name' => 'admin.seguridadYSalud.create']);
        Permission::create(['name' => 'admin.seguridadYSalud.edit']);
        Permission::create(['name' => 'admin.seguridadYSalud.destroy']);

        Permission::create(['name' => 'admin.sistemas.index']);
        Permission::create(['name' => 'admin.sistemas.create']);
        Permission::create(['name' => 'admin.sistemas.edit']);
        Permission::create(['name' => 'admin.sistemas.destroy']);

        Permission::create(['name' => 'admin.talento.index']);
        Permission::create(['name' => 'admin.talento.create']);
        Permission::create(['name' => 'admin.talento.edit']);
        Permission::create(['name' => 'admin.talento.destroy']);
        
        Permission::create(['name' => 'admin.talentoG.index']);
        Permission::create(['name' => 'admin.talentoG.create']);
        Permission::create(['name' => 'admin.talentoG.edit']);
        Permission::create(['name' => 'admin.talentoG.destroy']);


    }
}
