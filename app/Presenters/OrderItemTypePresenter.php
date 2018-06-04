<?php
namespace App\Presenters;

use App\Transformers\OrderItemTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class OrderItemTypePresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new OrderItemTypeTransformer();
    }
}
