<?php

use Illuminate\Database\Seeder;
use \Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'access_dashboard',
            'description' => 'Acceder al dashboard' // permiso para acceder al dashboard
        ]);
        // Modulo Permisos
        Permission::create([
            'name' => 'access_permission',
            'description' => 'Gestionar Roles y Permisos' // permiso para gestionar roles y permisos
        ]);
        // Modulo Tiendas
      Permission::create([
          'name' => 'create_store',
          'description' => 'Visualizar formulario de creacion' // permiso para ver formulario y vber el listado
        ]);
      Permission::create([
            'name' => 'save_store',
            'description' => 'Guardar informacion de tienda' // permiso para guardar una tienda
        ]);
      Permission::create([
            'name' => 'edit_store',
            'description' => 'Visualizar formulario de edicion'
        ]);
      Permission::create([
            'name' => 'update_store',
            'description' => 'Actualizar datos de la tienda'
        ]);
      Permission::create([
            'name' => 'destroy_store',
            'description' => 'Eliminar tiendas'
        ]);
      Permission::create([
            'name' => 'restore_store',
            'description' => 'Restaurar tiendas' // ver el formulario de restaurado
                                                // restaurar la tienda
        ]);

        // Modulo Categorias
        // Modulo Productos
        // Modulo Clientes
        // Modulo Pedidos
        // Modulo Metodo Pago
        // Modulo Metodo Envio

    }
}
