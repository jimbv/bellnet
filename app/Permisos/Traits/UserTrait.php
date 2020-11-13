<?php
namespace App\Permisos\Traits;

trait UserTrait{

      
    public function roles(){
        return $this->belongsToMany('App\Permisos\Models\Role')->withTimesTamps();
    }

    public function havePermission($permission){
        foreach($this->roles as $role){
            if ($role['acceso-total'] == 'si'){
                return true;
            }
            
            foreach ($role->permissions as $permiso) {
                if ($permiso['slug'] == $permission){
                    return true;
                }
            }

        }
        return false;
    }

}

?>