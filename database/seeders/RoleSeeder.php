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
        $role1=Role::create(['name'=> 'administrador']);
        $role2=Role::create(['name'=> 'nutricionista']);
        $role3=Role::create(['name'=> 'nuevo']);

        Permission::create(['name'=>'administradors.index',
                            'description'=>'ver listado de administradores'])->syncRoles([$role1]);
        Permission::create(['name'=>'administradors.create',
                            'description'=>'crear administrador'])->syncRoles([$role1]);
        Permission::create(['name'=>'administradors.edit',
                            'description'=>'editar administrador'])->syncRoles([$role1]);
        Permission::create(['name'=>'administradors.destroy',
                            'description'=>'eliminar administrador'])->syncRoles([$role1]);

        Permission::create(['name'=>'consultas.index',
                            'description'=>'ver listado de consultas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'consultas.create',
                            'description'=>'crear consulta'])->syncRoles([$role1]);
        Permission::create(['name'=>'consultas.edit',
                            'description'=>'editar consulta'])->syncRoles([$role1]);
        Permission::create(['name'=>'consultas.destroy',
                            'description'=>'eliminar consulta'])->syncRoles([$role1]);

        Permission::create(['name'=>'medidas.index',
                            'description'=>'ver listado de medidas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'medidas.create',
                            'description'=>'crear nota de medida'])->syncRoles([$role1]);
        Permission::create(['name'=>'medidas.edit',
                            'description'=>'editar nota de medida'])->syncRoles([$role1]);
        Permission::create(['name'=>'medidas.destroy',
                            'description'=>'eliminar nota de medida'])->syncRoles([$role1]);

        Permission::create(['name'=>'nutricionistas.index',
                            'description'=>'ver listado de nutricionistas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'nutricionistas.create',
                            'description'=>'crear nutricionista'])->syncRoles([$role1]);
        Permission::create(['name'=>'nutricionistas.edit',
                            'description'=>'editar nutricionista'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'nutricionistas.destroy',
                            'description'=>'eliminar nutricionista'])->syncRoles([$role1]);

        Permission::create(['name'=>'pacientes.index',
                            'description'=>'ver listado de pacientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'pacientes.create',
                            'description'=>'crear paciente'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'pacientes.edit',
                            'description'=>'editar paciente'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'pacientes.destroy',
                            'description'=>'eliminar paciente'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'roles.index',
                            'description'=>'ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.create',
                            'description'=>'crear rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.edit',
                            'description'=>'editar rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.destroy',
                            'description'=>'eliminar rol'])->syncRoles([$role1]);

        Permission::create(['name'=>'suscripcion_usuarios.index',
                            'description'=>'ver listado de suscripciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'suscripcion_usuarios.create',
                            'description'=>'crear suscripcion'])->syncRoles([$role1, $role3, $role2]);
        Permission::create(['name'=>'suscripcion_usuarios.edit',
                            'description'=>'editar suscripcion'])->syncRoles([$role1]);
        Permission::create(['name'=>'suscripcion_usuarios.destroy',
                            'description'=>'eliminar suscripcion'])->syncRoles([$role1]);

        Permission::create(['name'=>'suscripcions.index',
                            'description'=>'ver listado de planes de suscripcion'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'suscripcions.create',
                            'description'=>'crear planes de suscripcion'])->syncRoles([$role1]);
        Permission::create(['name'=>'suscripcions.edit',
                            'description'=>'editar planes de suscripcion'])->syncRoles([$role1]);
        Permission::create(['name'=>'suscripcions.destroy',
                            'description'=>'eliminar planes de suscripcion'])->syncRoles([$role1]);

        Permission::create(['name'=>'tipo_medidas.index',
                            'description'=>'ver listado de tipo de medidas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'tipo_medidas.create',
                            'description'=>'crear tipo de medida'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'tipo_medidas.edit',
                            'description'=>'editar tipo de medida'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'tipo_medidas.destroy',
                            'description'=>'eliminar tipo de medida'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'tratamientos.index',
                            'description'=>'ver listado de tratamientos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'tratamientos.create',
                            'description'=>'crear tratamiento'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'tratamientos.edit',
                            'description'=>'editar tratamiento'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'tratamientos.destroy',
                            'description'=>'eliminar tratamiento'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'unidadMedidas.index',
                            'description'=>'ver listado de unidad de medidas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'unidadMedidas.create',
                            'description'=>'crear unidad de medida'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'unidadMedidas.edit',
                            'description'=>'editar unidad de medida'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'unidadMedidas.destroy',
                            'description'=>'eliminar unidad de medida'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'users.index',
                            'description'=>'ver listado de usuarios'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'users.create',
                            'description'=>'crear usuarios'])->syncRoles([$role1, $role3, $role2]);
        Permission::create(['name'=>'users.edit',
                            'description'=>'editar usuario'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'users.destroy',
                            'description'=>'eliminar usuario'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'actividads.index',
                            'description'=>'ver listado de actividades'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'actividads.create',
                            'description'=>'crear actividad'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'actividads.edit',
                            'description'=>'editar actividad'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'actividads.destroy',
                            'description'=>'eliminar actividad'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'alimentos.index',
                            'description'=>'ver listado de alimentos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'alimentos.create',
                            'description'=>'crear alimento'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'alimentos.edit',
                            'description'=>'editar alimento'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'alimentos.destroy',
                            'description'=>'eliminar alimento'])->syncRoles([$role1, $role2]);

        // Permission::create(['name'=>'recetas.index',
        //                     'description'=>'ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name'=>'recetas.create',
                            'description'=>'crear receta'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'recetas.edit',
                            'description'=>'editar receta'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'recetas.destroy',
                            'description'=>'eliminar receta'])->syncRoles([$role1, $role2]);























    }
}
