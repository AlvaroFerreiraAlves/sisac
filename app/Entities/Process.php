<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Process extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['id_professor','id_coordenador','matricula','situacao','status','id_regulamento','id_usuario','id_curso_usuario'];

}
