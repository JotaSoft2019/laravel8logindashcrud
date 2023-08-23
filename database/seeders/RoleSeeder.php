<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
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


        Permission::create(['name' => 'admin.articulos'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'admin.adn.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.adn.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.adn.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.adn.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.calendario.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.calendario.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.calendario.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.calendario.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.comercials.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.comercials.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.comercials.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.comercials.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.comex.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.comex.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.comex.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.comex.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.contabilidads.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contabilidads.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contabilidads.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contabilidads.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.compras.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.compras.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.compras.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.compras.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.articulo.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.articulo.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.articulo.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.articulo.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.logistica.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.logistica.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.logistica.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.logistica.destroy'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.gerencia.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.gerencia.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.gerencia.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.gerencia.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.lideres.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.lideres.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.lideres.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.lideres.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.mercadeo.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.mercadeo.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.mercadeo.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.mercadeo.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.reconocimientos.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reconocimientos.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reconocimientos.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reconocimientos.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.seguridadYSalud.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.seguridadYSalud.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.seguridadYSalud.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.seguridadYSalud.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.inventario.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.inventario.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.inventario.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.inventario.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.talentoHumano.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.talentoHumano.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.talentoHumano.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.talentoHumano.destroy'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'admin.talento.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.talento.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.talento.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.talento.destroy'])->syncRoles([$role1, $role2]);


    }
}
