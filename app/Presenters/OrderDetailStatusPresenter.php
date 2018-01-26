<?php

namespace App\Presenters;

use App\Transformers\OrderDetailStatusTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrderDetailStatusPresenter
 * @package namespace App\Presenters;
 */
class OrderDetailStatusPresenter extends FractalPresenter
{
    /**
     * Transformer
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrderDetailStatusTransformer();
    }
}
