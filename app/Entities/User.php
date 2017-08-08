<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','matricula', 'email','cpf', 'password','status','id_curso',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   /* protected $hidden = [
        'password', 'remember_token',
    ];*/

   public function tipoUsuario(){
       return $this->belongsToMany(UserType::class, 'user_types_users', 'id_usuario', 'id_tipo_usuario');
   }
}
