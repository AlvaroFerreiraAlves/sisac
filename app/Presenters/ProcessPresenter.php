<?php

namespace App\Presenters;

use App\Transformers\ProcessTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProcessPresenter
 *
 * @package namespace App\Presenters;
 */
class ProcessPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProcessTransformer();
    }
}
