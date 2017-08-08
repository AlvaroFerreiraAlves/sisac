<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ActivityType extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['nome','descricao','qt_min','status','id_regulamento'];

}
