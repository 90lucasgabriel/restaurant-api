<?php

namespace App\Presenters;

use App\Transformers\CouponTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CouponPresenter
 *
 * @package namespace App\Presenters;
 */
class CouponPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new CouponTransformer();
    }
}
