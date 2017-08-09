<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Solicitation;

/**
 * Class SolicitationTransformer
 * @package namespace App\Transformers;
 */
class SolicitationTransformer extends TransformerAbstract
{

    /**
     * Transform the \Solicitation entity
     * @param \Solicitation $model
     *
     * @return array
     */
    public function transform(Solicitation $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
