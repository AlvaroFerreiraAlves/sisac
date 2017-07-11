<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ActivityType;

/**
 * Class ActivityTypeTransformer
 * @package namespace App\Transformers;
 */
class ActivityTypeTransformer extends TransformerAbstract
{

    /**
     * Transform the \ActivityType entity
     * @param \ActivityType $model
     *
     * @return array
     */
    public function transform(ActivityType $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
