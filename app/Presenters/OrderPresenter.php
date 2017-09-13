<?php
namespace App\Presenters;

use App\Transformers\OrderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class OrderPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new OrderTransformer();
    }
}
