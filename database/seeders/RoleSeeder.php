<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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
        $role1=Role::create(['name'=> 'nutricionista']);
        $role2=Role::create(['name'=> 'paciente']);

        Permission::create(['name'=>'users.index',
                            'description'=>'ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.create',
                            'description'=>'crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.edit',
                            'description'=>'editar usuario'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.destroy',
                            'description'=>'eliminar usuario'])->syncRoles([$role1]);


        Permission::create(['name'=>'nutricionistas.index',
                            'description'=>'ver listado de cargos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'nutricionistas.create',
                            'description'=>'crear cargo'])->syncRoles([$role1]);
        Permission::create(['name'=>'nutricionistas.edit',
                            'description'=>'editar cargo'])->syncRoles([$role1]);
        Permission::create(['name'=>'nutricionistas.destroy',
                            'description'=>'eliminar cargo'])->syncRoles([$role1]);


        Permission::create(['name'=>'proveedors.index',
                            'description'=>'ver listado de proveedores'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'proveedors.create',
                            'description'=>'crear proveedor'])->syncRoles([$role1]);
        Permission::create(['name'=>'proveedors.edit',
                            'description'=>'editar proveedor'])->syncRoles([$role1]);
        Permission::create(['name'=>'proveedors.destroy',
                            'description'=>'eliminar proveedor'])->syncRoles([$role1]);

        
        Permission::create(['name'=>'unidadMedida.index',
                            'description'=>'ver listado de unidad de medidas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'unidadMedida.create',
                            'description'=>'crear unidad de medida'])->syncRoles([$role1]);
        Permission::create(['name'=>'unidadMedida.edit',
                            'description'=>'editar unidad de medida'])->syncRoles([$role1]);
        Permission::create(['name'=>'unidadMedida.destroy',
                            'description'=>'eliminar unidad de medida'])->syncRoles([$role1]);
    

        Permission::create(['name'=>'roles.index',
                            'description'=>'ver listado de roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'roles.create',
                            'description'=>'crear rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.edit',
                            'description'=>'editar rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.destroy',
                            'description'=>'eliminar rol'])->syncRoles([$role1]); 
    

        Permission::create(['name'=>'paciente.index',
                            'description'=>'ver listado de trabajadores'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'paciente.create',
                            'description'=>'crear trabajador'])->syncRoles([$role1]);
        Permission::create(['name'=>'paciente.edit',
                            'description'=>'editar trabajador'])->syncRoles([$role1]);
        Permission::create(['name'=>'paciente.destroy',
                            'description'=>'eliminar trabajador'])->syncRoles([$role1]); 


         Permission::create(['name'=>'consulta.index',
                            'description'=>'ver listado de trabajadores'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'consulta.create',
                            'description'=>'crear trabajador'])->syncRoles([$role1]);
        Permission::create(['name'=>'consulta.edit',
                            'description'=>'editar trabajador'])->syncRoles([$role1]);
        Permission::create(['name'=>'consulta.destroy',
                            'description'=>'eliminar trabajador'])->syncRoles([$role1]); 


        // Permission::create(['name'=>'encargados.index',
        //                     'description'=>'ver listado de encargados'])->syncRoles([$role1, $role2]);
        // Permission::create(['name'=>'encargados.create',
        //                     'description'=>'crear encargado'])->syncRoles([$role1]);
        // Permission::create(['name'=>'encargados.edit',
        //                     'description'=>'editar encargado'])->syncRoles([$role1]);
        // Permission::create(['name'=>'encargados.destroy',
        //                     'description'=>'eliminar encargado'])->syncRoles([$role1]); 

                            
        // Permission::create(['name'=>'cliente.index',
        //                     'description'=>'ver listado de clientes'])->syncRoles([$role1, $role2]);
        // Permission::create(['name'=>'cliente.create',
        //                     'description'=>'crear cliente'])->syncRoles([$role1]);
        // Permission::create(['name'=>'cliente.edit',
        //                     'description'=>'editar cliente'])->syncRoles([$role1]);
        // Permission::create(['name'=>'cliente.destroy',
        //                     'description'=>'eliminar cliente'])->syncRoles([$role1]); 



        // Permission::create(['name'=>'detalleProductos.index',
        //                     'description'=>'ver listado de clientes'])->syncRoles([$role1, $role2]);
        // Permission::create(['name'=>'detalleProductos.create',
        //                     'description'=>'crear cliente'])->syncRoles([$role1]);
        // Permission::create(['name'=>'detalleProductos.edit',
        //                     'description'=>'editar cliente'])->syncRoles([$role1]);
        // Permission::create(['name'=>'detalleProductos.destroy',
        //                     'description'=>'eliminar cliente'])->syncRoles([$role1]); 


        // Permission::create(['name'=>'Nota_de_compras.index',
        //                     'description'=>'ver listado de compras'])->syncRoles([$role1, $role2]);
        // Permission::create(['name'=>'Nota_de_compras.create',
        //                     'description'=>'crear nota de compra'])->syncRoles([$role1]);
        // Permission::create(['name'=>'Nota_de_compras.edit',
        //                     'description'=>'editar nota de compra'])->syncRoles([$role1]);
        // Permission::create(['name'=>'Nota_de_compras.destroy',
        //                     'description'=>'eliminar nota de compra'])->syncRoles([$role1]); 
    }
}
