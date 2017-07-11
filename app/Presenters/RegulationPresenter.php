<?php

namespace App\Presenters;

use App\Transformers\RegulationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RegulationPresenter
 *
 * @package namespace App\Presenters;
 */
class RegulationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RegulationTransformer();
    }
}
