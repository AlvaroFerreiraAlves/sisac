<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Solicitation extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [ 'name','matricula', 'email','cpf', 'password','status','id_curso'];

}
