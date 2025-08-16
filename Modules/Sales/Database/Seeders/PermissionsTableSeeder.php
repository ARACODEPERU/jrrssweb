<?php

namespace Modules\Sales\Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::find(1);

        $modulo = Modulo::create(['identifier' => 'M002', 'description' => 'Ventas']);
        $moduloFE = Modulo::create(['identifier' => 'M003', 'description' => 'Facturación Electrónica']);
        $moduloAC = Modulo::create(['identifier' => 'M015', 'description' => 'Cuentas por cobrar']);

        $permissions = [];
        $permissionsFE = [];

        array_push($permissions, Permission::create(['name' => 'sale_dashboard']));
        array_push($permissions, Permission::create(['name' => 'productos']));
        array_push($permissions, Permission::create(['name' => 'productos_nuevo']));
        array_push($permissions, Permission::create(['name' => 'productos_editar']));
        array_push($permissions, Permission::create(['name' => 'productos_eliminar']));
        array_push($permissions, Permission::create(['name' => 'productos_codigoqr']));
        array_push($permissions, Permission::create(['name' => 'productos_salida']));
        array_push($permissions, Permission::create(['name' => 'productos_entrada']));
        array_push($permissions, Permission::create(['name' => 'caja_chica']));
        array_push($permissions, Permission::create(['name' => 'clientes']));
        array_push($permissions, Permission::create(['name' => 'clientes_nuevo']));
        array_push($permissions, Permission::create(['name' => 'clientes_editar']));
        array_push($permissions, Permission::create(['name' => 'clientes_eliminar']));
        array_push($permissions, Permission::create(['name' => 'proveedores']));
        array_push($permissions, Permission::create(['name' => 'proveedores_nuevo']));
        array_push($permissions, Permission::create(['name' => 'proveedores_editar']));
        array_push($permissions, Permission::create(['name' => 'proveedores_eliminar']));
        array_push($permissions, Permission::create(['name' => 'punto_ventas']));
        array_push($permissions, Permission::create(['name' => 'sale_reportes']));
        array_push($permissions, Permission::create(['name' => 'sale_tienda']));
        array_push($permissions, Permission::create(['name' => 'sale_tienda_nuevo']));
        array_push($permissions, Permission::create(['name' => 'sale_tienda_editar']));
        array_push($permissions, Permission::create(['name' => 'sale_tienda_eliminar']));
        array_push($permissions, Permission::create(['name' => 'sale_tienda_series']));
        array_push($permissions, Permission::create(['name' => 'sale_tienda_agregar_vendedor']));
        array_push($permissions, Permission::create(['name' => 'sale_categorias']));
        array_push($permissions, Permission::create(['name' => 'sale_categorias_nuevo']));
        array_push($permissions, Permission::create(['name' => 'sale_categorias_editar']));
        array_push($permissions, Permission::create(['name' => 'sale_categorias_eliminar']));
        array_push($permissions, Permission::create(['name' => 'sale_marcas']));
        array_push($permissions, Permission::create(['name' => 'sale_marcas_nuevo']));
        array_push($permissions, Permission::create(['name' => 'sale_marcas_editar']));
        array_push($permissions, Permission::create(['name' => 'sale_marcas_eliminar']));
        array_push($permissions, Permission::create(['name' => 'sale_marcas_visualizar']));
        array_push($permissions, Permission::create(['name' => 'sale_marcas_agregar']));
        array_push($permissions, Permission::create(['name' => 'sale_categorias_visualizar']));
        array_push($permissions, Permission::create(['name' => 'sale_categorias_agregar']));
        array_push($permissions, Permission::create(['name' => 'sale_documento_fisico']));
        array_push($permissions, Permission::create(['name' => 'sale_documento_fisico_nuevo']));
        array_push($permissions, Permission::create(['name' => 'sale_documento_fisico_editar']));
        array_push($permissions, Permission::create(['name' => 'sale_documento_fisico_eliminar']));
        array_push($permissions, Permission::create(['name' => 'sale_servicios']));
        array_push($permissions, Permission::create(['name' => 'sale_servicios_nuevo']));
        array_push($permissions, Permission::create(['name' => 'sale_servicios_editar']));
        array_push($permissions, Permission::create(['name' => 'sale_servicios_eliminar']));
        array_push($permissions, Permission::create(['name' => 'sale_productos_importar']));
        array_push($permissions, Permission::create(['name' => 'sale_aplicar_descuento']));
        array_push($permissions, Permission::create(['name' => 'sale_registar_producto_alvender']));
        array_push($permissions, Permission::create(['name' => 'sale_enventas_buscar_por_presentacion']));

        array_push($permissionsFE, Permission::create(['name' => 'invo_dashboard']));
        array_push($permissionsFE, Permission::create(['name' => 'invo_documento']));
        array_push($permissionsFE, Permission::create(['name' => 'invo_documento_nuevo']));
        array_push($permissionsFE, Permission::create(['name' => 'invo_documento_lista']));
        array_push($permissionsFE, Permission::create(['name' => 'invo_documento_envio_sunat']));
        array_push($permissionsFE, Permission::create(['name' => 'invo_resumenes_lista']));
        array_push($permissionsFE, Permission::create(['name' => 'invo_comunicacion_baja']));
        array_push($permissionsFE, Permission::create(['name' => 'invo_nota_credito']));
        array_push($permissionsFE, Permission::create(['name' => 'invo_reportes']));

        array_push($permissionsAC, Permission::create(['name' => 'acco_dashboard']));
        array_push($permissionsAC, Permission::create(['name' => 'acco_documento_listado']));

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission->name);

            DB::table('model_has_permissions')->insert([
                'permission_id' => $permission->id,
                'model_type' => Modulo::class,
                'model_id' => $modulo->identifier
            ]);
        }

        foreach ($permissionsFE as $permission) {
            $role->givePermissionTo($permission->name);

            DB::table('model_has_permissions')->insert([
                'permission_id' => $permission->id,
                'model_type' => Modulo::class,
                'model_id' => $moduloFE->identifier
            ]);
        }

        foreach ($permissionsAC as $permission) {
            $role->givePermissionTo($permission->name);

            DB::table('model_has_permissions')->insert([
                'permission_id' => $permission->id,
                'model_type' => Modulo::class,
                'model_id' => $moduloAC->identifier
            ]);
        }
    }
}
