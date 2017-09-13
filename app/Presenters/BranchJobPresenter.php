<?php

namespace App\Presenters;

use App\Transformers\BranchJobTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BranchJobPresenter
 *
 * @package namespace App\Presenters;
 */
class BranchJobPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new BranchJobTransformer();
    }
}
