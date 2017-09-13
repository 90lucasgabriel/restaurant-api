<?php

namespace App\Presenters;

use App\Transformers\ProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductPresenter
 *
 * @package namespace App\Presenters;
 */
class ProductPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new ProductTransformer();
    }
}
