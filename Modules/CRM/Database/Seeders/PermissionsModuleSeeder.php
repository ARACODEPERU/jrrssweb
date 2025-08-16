<?php

namespace Modules\CRM\Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::find(1);

        $modulo = Modulo::create(['identifier' => 'M008', 'description' => 'Gestión de Clientes y Comunicación']);

        $permissions = [];

        array_push($permissions, Permission::create(['name' => 'crm_dashboard']));
        array_push($permissions, Permission::create(['name' => 'crm_contactos_listado']));
        array_push($permissions, Permission::create(['name' => 'crm_contactos_nuevo']));
        array_push($permissions, Permission::create(['name' => 'crm_contactos_editar']));
        array_push($permissions, Permission::create(['name' => 'crm_contactos_eliminar']));
        array_push($permissions, Permission::create(['name' => 'crm_chat_dashboard']));
        array_push($permissions, Permission::create(['name' => 'crm_mailbox_dashboard']));
        array_push($permissions, Permission::create(['name' => 'crm_chat_notifications']));
        array_push($permissions, Permission::create(['name' => 'crm_chat_messages']));
        array_push($permissions, Permission::create(['name' => 'crm_envio_correo_masivo']));

        array_push($permissions, Permission::create(['name' => 'crm_empresas_listado']));
        array_push($permissions, Permission::create(['name' => 'crm_empresas_nuevo']));
        array_push($permissions, Permission::create(['name' => 'crm_empresas_editar']));
        array_push($permissions, Permission::create(['name' => 'crm_empresas_eliminar']));
        array_push($permissions, Permission::create(['name' => 'crm_empresas_empleados']));
        array_push($permissions, Permission::create(['name' => 'crm_empresas_agregar_empleados']));
        array_push($permissions, Permission::create(['name' => 'crm_empresas_eliminar_empleados']));
        array_push($permissions, Permission::create(['name' => 'crm_empresas_enviar_correo_empleados']));

        array_push($permissions, Permission::create(['name' => 'crm_clientes_preguntas_ia']));
        array_push($permissions, Permission::create(['name' => 'crm_dudas_comunes']));
        array_push($permissions, Permission::create(['name' => 'crm_dudas_comunes_edicion']));

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission->name);
            DB::table('model_has_permissions')->insert([
                'permission_id' => $permission->id,
                'model_type' => Modulo::class,
                'model_id' => $modulo->identifier
            ]);
        }
    }
}
