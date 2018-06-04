<?php

namespace App\Presenters;

use App\Transformers\OrderItemStatusTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrderItemStatusPresenter
 * @package namespace App\Presenters;
 */
class OrderItemStatusPresenter extends FractalPresenter
{
    /**
     * Transformer
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrderItemStatusTransformer();
    }
}
