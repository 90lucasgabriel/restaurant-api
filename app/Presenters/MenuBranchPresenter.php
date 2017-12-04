<?php

namespace App\Presenters;

use App\Transformers\MenuBranchTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MenuBranchPresenter
 *
 * @package namespace App\Presenters;
 */
class MenuBranchPresenter extends FractalPresenter
{
     /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MenuBranchTransformer();
    }
}
