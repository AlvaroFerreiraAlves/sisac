<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Activity extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['titulo','descricao','documento','qt_horas','status','situacao','id_tipo_atividade','id_processo'];

}
