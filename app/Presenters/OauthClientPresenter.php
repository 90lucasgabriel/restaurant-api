<?php

namespace App\Presenters;

use App\Transformers\UserTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserPresenter
 *
 * @package namespace App\Presenters;
 */
class OauthClientPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new OauthClientTransformer();
    }
}
