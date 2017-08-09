<?php

namespace App\Presenters;

use App\Transformers\SolicitationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SolicitationPresenter
 *
 * @package namespace App\Presenters;
 */
class SolicitationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SolicitationTransformer();
    }
}
