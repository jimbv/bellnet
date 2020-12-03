<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

use App\User;
use App\Permisos\Models\Role;
use App\Permisos\Models\Permission;
use Illuminate\Support\Facades\Hash;



class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET foreign_key_checks=0'); //  Dejo de verificar las claves foraneas
            // Truncate para tablas que no tienen modelo
            DB::table('permission_role')->truncate();
            DB::table('role_user')->truncate();
            // Truncate para tabla que si tiene modelo
            Permission::truncate();
            Role::truncate();
        DB::statement('SET foreign_key_checks=1'); //  Vuelvo verificar las claves foraneas

        // Usuario Admin
        $useradmin = User::where('email','admin@admin.com')->first();
        if($useradmin){
            $useradmin->delete();
        }

        $useradmin = User::create([
            'apellido' =>  'Administrador',
            'nombres' =>  'Bellnet',
            'email' =>  'admin@admin.com', 
            'password' => Hash::make('admin'),
            'calle' =>  'Calle',
            'numero' =>  123,
            'telefono' => '3537000000',
            'nacimiento' => '1987-06-23',
            'cuit' => '20123456789',
            'localidad_id'=> 926
        ]);

        // Rol Admin
        $roladmin = Role::create([
            'nombre'=>'Admin',
            'slug'=>'admin',
            'descripcion'=>'Administrador',
            'acceso-total'=>'si'
            ]);
        
        // tabla role_user
        $useradmin->roles()->sync([$roladmin->id]);




        // Permisos del Role Admin    
        $permission_all = [];

        // Permisos para usar los roles
        $permission = Permission::create([
            'nombre'=>'Listar roles',
            'slug'=>'role.index',
            'descripcion'=>'Un usuario puede listar los roles' 
            ]);
        $permission_all[]=$permission->id;

        $permission = Permission::create([
            'nombre'=>'Mostrar rol',
            'slug'=>'role.show',
            'descripcion'=>'Un usuario puede ver un rol' 
            ]);
        $permission_all[]=$permission->id;

        $permission = Permission::create([
            'nombre'=>'Crear rol',
            'slug'=>'role.create',
            'descripcion'=>'Un usuario puede crear un rol' 
            ]);
        $permission_all[]=$permission->id;

        $permission = Permission::create([
            'nombre'=>'Editar rol',
            'slug'=>'role.edit',
            'descripcion'=>'Un usuario puede editar un rol' 
            ]);
        $permission_all[]=$permission->id;

        $permission = Permission::create([
            'nombre'=>'Eliminar rol',
            'slug'=>'role.destroy',
            'descripcion'=>'Un usuario puede eliminar un rol' 
            ]);
        $permission_all[]=$permission->id;

        // Permisos para usar los usuarios
        $permission = Permission::create([
            'nombre'=>'Listar usuarios',
            'slug'=>'user.index',
            'descripcion'=>'Un usuario puede listar los usuarios' 
            ]);
        $permission_all[]=$permission->id;

        $permission = Permission::create([
            'nombre'=>'Mostrar usuario',
            'slug'=>'user.show',
            'descripcion'=>'Un usuario puede ver un usuario' 
            ]);
        $permission_all[]=$permission->id;

        $permission = Permission::create([
            'nombre'=>'Crear usuario',
            'slug'=>'user.create',
            'descripcion'=>'Un usuario puede crear un usuario' 
            ]);
        $permission_all[]=$permission->id;

        $permission = Permission::create([
            'nombre'=>'Editar usuario',
            'slug'=>'user.edit',
            'descripcion'=>'Un usuario puede editar un usuario' 
            ]);
        $permission_all[]=$permission->id;

        $permission = Permission::create([
            'nombre'=>'Eliminar usuario',
            'slug'=>'user.destroy',
            'descripcion'=>'Un usuario puede eliminar un usuario' 
            ]);
        $permission_all[]=$permission->id;


        // tabla permission_role   
        $roladmin->permissions()->sync($permission_all);


        
    }
}
