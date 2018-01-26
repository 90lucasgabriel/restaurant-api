<?php
namespace App\Presenters;

use App\Transformers\OrderDetailTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class OrderDetailPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new OrderDetailTransformer();
    }
}
