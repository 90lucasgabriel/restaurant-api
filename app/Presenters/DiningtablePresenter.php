<?php

namespace App\Presenters;

use App\Transformers\DiningtableTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DiningtablePresenter
 *
 * @package namespace App\Presenters;
 */
class DiningtablePresenter extends FractalPresenter
{
     /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DiningtableTransformer();
    }
}
