<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserType extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

    public function users(){
        return $this->belongsToMany(User::class, 'user_types_users', 'id_tipo_usuario', '	id_usuario');
    }

}
