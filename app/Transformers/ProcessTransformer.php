<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Process;

/**
 * Class ProcessTransformer
 * @package namespace App\Transformers;
 */
class ProcessTransformer extends TransformerAbstract
{

    /**
     * Transform the \Process entity
     * @param \Process $model
     *
     * @return array
     */
    public function transform(Process $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
