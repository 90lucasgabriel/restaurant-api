<?php
namespace App\Presenters;

use App\Transformers\OrderDetailTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class OrderDetailTypePresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new OrderDetailTypeTransformer();
    }
}
