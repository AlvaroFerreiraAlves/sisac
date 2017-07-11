<?php

namespace App\Presenters;

use App\Transformers\UserTypesUserTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserTypesUserPresenter
 *
 * @package namespace App\Presenters;
 */
class UserTypesUserPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserTypesUserTransformer();
    }
}
