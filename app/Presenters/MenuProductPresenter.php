<?php

namespace App\Presenters;

use App\Transformers\MenuProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MenuProductPresenter
 *
 * @package namespace App\Presenters;
 */
class MenuProductPresenter extends FractalPresenter
{
     /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MenuProductTransformer();
    }
}
