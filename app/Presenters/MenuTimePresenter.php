<?php

namespace App\Presenters;

use App\Transformers\MenuTimeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MenuTimePresenter
 *
 * @package namespace App\Presenters;
 */
class MenuTimePresenter extends FractalPresenter
{
     /**
     * Transformer
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MenuTimeTransformer();
    }
}
