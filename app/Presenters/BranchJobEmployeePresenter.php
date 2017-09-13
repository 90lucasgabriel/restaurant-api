<?php

namespace App\Presenters;

use App\Transformers\BranchJobEmployeeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BranchJobEmployeePresenter
 *
 * @package namespace App\Presenters;
 */
class BranchJobEmployeePresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new BranchJobEmployeeTransformer();
    }
}
