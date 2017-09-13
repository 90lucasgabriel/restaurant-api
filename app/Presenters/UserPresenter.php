<?php

namespace App\Presenters;

use App\Transformers\UserTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserPresenter
 *
 * @package namespace App\Presenters;
 */
class UserPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new UserTransformer();
    }
}
