<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Regulation;

/**
 * Class RegulationTransformer
 * @package namespace App\Transformers;
 */
class RegulationTransformer extends TransformerAbstract
{

    /**
     * Transform the \Regulation entity
     * @param \Regulation $model
     *
     * @return array
     */
    public function transform(Regulation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
