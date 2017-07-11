<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\UserTypesUser;

/**
 * Class UserTypesUserTransformer
 * @package namespace App\Transformers;
 */
class UserTypesUserTransformer extends TransformerAbstract
{

    /**
     * Transform the \UserTypesUser entity
     * @param \UserTypesUser $model
     *
     * @return array
     */
    public function transform(UserTypesUser $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
