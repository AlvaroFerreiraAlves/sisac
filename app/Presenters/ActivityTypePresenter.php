<?php

namespace App\Presenters;

use App\Transformers\ActivityTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ActivityTypePresenter
 *
 * @package namespace App\Presenters;
 */
class ActivityTypePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ActivityTypeTransformer();
    }
}
