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
        $role3 = Role::create(['name'=> 'Admin-mercadeo']);
        $role4 = Role::create(['name'=> 'User-Comercial']);
        $role5 = Role::create(['name'=> 'Admin-comercial']);
        Permission::create(['name' => 'articulos','description' =>'Ver inicio'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'users','description' =>'Ver Administracion de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.index','description' =>'Ver tabla de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit','description' =>'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update','description' =>'Eliminar Usuario'])->syncRoles([$role1]);

        Permission::create(['name' => 'adn.index','description' =>'Ver adn Jota Mundial'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'adn.create','description' =>'Subir pdf adn'])->syncRoles([$role1]);
        Permission::create(['name' => 'adn.edit','description' =>'Editar pdf adn'])->syncRoles([$role1]);
        Permission::create(['name' => 'adn.destroy','description' =>'Eliminar pdf'])->syncRoles([$role1]);

        Permission::create(['name' => 'calendario.index','description' =>'Ver calendario'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'calendario.edit','description' =>'Editar evento calendario'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'calendario.create','description' =>'Crear Evento calendario'])->syncRoles([$role1,$role3]);
        Permission::create(['name' => 'calendario.destroy','description' =>'Eliminar evento calendario'])->syncRoles([$role1,$role3]);

        Permission::create(['name' => 'comercials.index','description' =>'Visualizar modulo comercial'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'comercials.edit','description' =>'Editar informacion comercial'])->syncRoles([$role1]);
        Permission::create(['name' => 'comercials.create','description' =>'crear informacion comercial'])->syncRoles([$role1]);
        Permission::create(['name' => 'comercials.destroy','description' =>'Eliminar informacion comercial'])->syncRoles([$role1]);
        Permission::create(['name' => 'comentario.index','description' =>'Visualizar modulo comercial'])->syncRoles([$role1,$role4,$role5]);
        Permission::create(['name' => 'comentario.edit','description' =>'Editar informacion comercial'])->syncRoles([$role1,$role4,$role5]);
        Permission::create(['name' => 'comentario.create','description' =>'crear informacion comercial'])->syncRoles([$role1,$role4,$role5]);
        Permission::create(['name' => 'comentario.destroy','description' =>'Eliminar informacion comercial'])->syncRoles([$role1,$role4,$role5]);

        Permission::create(['name' => 'comex.index','description' =>'Ver informacion de comex'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'comex.edit','description' =>'Editar informacion de comex'])->syncRoles([$role1]);
        Permission::create(['name' => 'comex.create','description' =>'Crear informacion de comex'])->syncRoles([$role1]);
        Permission::create(['name' => 'comex.destroy','description' =>'Eliminar informacion de comex'])->syncRoles([$role1]);

        Permission::create(['name' => 'contabilidads.index','description' =>'Ver informacion de contabilidad'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'contabilidads.create','description' =>'Crear informacion de contabilidad'])->syncRoles([$role1]);
        Permission::create(['name' => 'contabilidads.edit','description' =>'Editar informacion de contabilidad'])->syncRoles([$role1]);
        Permission::create(['name' => 'contabilidads.destroy','description' =>'Eliminar informacion de contabilidad'])->syncRoles([$role1]);

        Permission::create(['name' => 'compras','description' =>'Ver informacion de compras nacionales'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'compras.create','description' =>'Crear informacion de compras nacionales'])->syncRoles([$role1]);
        Permission::create(['name' => 'compras.edit','description' =>'Editar informacion de compras nacionales'])->syncRoles([$role1]);
        Permission::create(['name' => 'compras.destroy','description' =>'Eliminar informacion de compras nacionales'])->syncRoles([$role1]);

        Permission::create(['name' => 'articulo','description' =>'Ver inicio'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'articulo.create','description' =>'Crear contenido del inicio'])->syncRoles([$role1]);
        Permission::create(['name' => 'articulo.edit','description' =>'Editar contenido del inicio'])->syncRoles([$role1]);
        Permission::create(['name' => 'articulo.destroy','description' =>'Eliminar contenido del inicio'])->syncRoles([$role1]);

        Permission::create(['name' => 'logistica','description' =>'Ver informacion de logistica'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'logistica.create','description' =>'Crear informacion de logistica'])->syncRoles([$role1]);
        Permission::create(['name' => 'logistica.edit','description' =>'Editar informacion de logistica'])->syncRoles([$role1]);
        Permission::create(['name' => 'logistica.destroy','description' =>'Eliminar informacion de logistica'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'gerencia','description' =>'Ver informacion de gerencia'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'gerencia.create','description' =>'Crear informacion de gerencia'])->syncRoles([$role1]);
        Permission::create(['name' => 'gerencia.edit','description' =>'Editar informacion de gerencia'])->syncRoles([$role1]);
        Permission::create(['name' => 'gerencia.destroy','description' =>'Eliminar informacion de gerencia'])->syncRoles([$role1]);

        Permission::create(['name' => 'lideres','description' =>'Ver lideres'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'lideres.create','description' =>'Crear los lideres'])->syncRoles([$role1]);
        Permission::create(['name' => 'lideres.edit','description' =>'Editar los lideres'])->syncRoles([$role1]);
        Permission::create(['name' => 'lideres.destroy','description' =>'Eliminar los lideres'])->syncRoles([$role1]);

        Permission::create(['name' => 'mercadeo','description' =>'Ver informacion de mercaeo'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'mercadeo.edit','description' =>'Editar informacion de mercadeo'])->syncRoles([$role1]);
        Permission::create(['name' => 'mercadeo.create','description' =>'Crear informacion de mercadeo'])->syncRoles([$role1]);
        Permission::create(['name' => 'mercadeo.destroy','description' =>'Eliminar informacion de mercadeo'])->syncRoles([$role1]);

        Permission::create(['name' => 'reconocimientos','description' =>'Ver reconocimientos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'reconocimientos.create','description' =>'Crear reconocimientos'])->syncRoles([$role1]);
        Permission::create(['name' => 'reconocimientos.edit','description' =>'Editar los reconocimientos'])->syncRoles([$role1]);
        Permission::create(['name' => 'reconocimientos.destroy','description' =>'Eliminar los reconocimientos'])->syncRoles([$role1]);

        Permission::create(['name' => 'seguridadYSalud','description' =>'Ver pdf de seguridad y salud'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'seguridadYSalud.create','description' =>'Crear pdf de seguridad y salud'])->syncRoles([$role1]);
        Permission::create(['name' => 'seguridadYSalud.edit','description' =>'editar pdf de seguridad y salud'])->syncRoles([$role1]);
        Permission::create(['name' => 'seguridadYSalud.destroy','description' =>'Eliminar pdf'])->syncRoles([$role1]);

        Permission::create(['name' => 'inventario','description' =>'Ver informacion de sistema e inventario'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'inventario.create','description' =>'Crear informacion de sistema e inventario'])->syncRoles([$role1]);
        Permission::create(['name' => 'inventario.edit','description' =>'Editar informacion de sistema e inventario'])->syncRoles([$role1]);
        Permission::create(['name' => 'inventario.destroy','description' =>'Eliminar informacion de sistema e inventario'])->syncRoles([$role1]);

        Permission::create(['name' => 'talentoHumano','description' =>'Ver pdf talento humano'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'talentoHumano.create','description' =>'crear pdf talento humano'])->syncRoles([$role1]);
        Permission::create(['name' => 'talentoHumano.edit','description' =>'Editar pdf talento humano'])->syncRoles([$role1]);
        Permission::create(['name' => 'talentoHumano.destroy','description' =>'Eliminar pdf'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'talento','description' =>'Ver Informacion talento humano'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'talento.create','description' =>'Crear informacion talento Humano'])->syncRoles([$role1]);
        Permission::create(['name' => 'talento.edit','description' =>'Editar informacion talento Humano'])->syncRoles([$role1]);
        Permission::create(['name' => 'talento.destroy', 'description' =>'Eliminar informacion talento humano'])->syncRoles([$role1]); 

        Permission::create(['name' => 'roles','description' =>'Ver Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create','description' =>'Crear rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit','description' =>'Editar rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy', 'description' =>'Eliminar rol'])->syncRoles([$role1]); 

        Permission::create(['name' => 'agregar recomendaciones', 'description' =>'Agregar Recomendaciones'])->syncRoles([$role1]);
    }
}
