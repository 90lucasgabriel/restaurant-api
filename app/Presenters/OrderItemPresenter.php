<?php
namespace App\Presenters;

use App\Transformers\OrderItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class OrderItemPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new OrderItemTransformer();
    }
}
