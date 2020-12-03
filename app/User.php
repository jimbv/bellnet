<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Permisos\Traits\UserTrait;
use App\Permisos\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'apellido','nombres','email', 'password','cuit','calle','numero','depto','nacimiento','telefono','localidad_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function localidad()
    {
        return $this->belongsTo('App\Localidad');
    }

    public function roles(){
        return $this->belongsToMany('App\Permisos\Models\Role')->withTimesTamps();
    }
  
}
