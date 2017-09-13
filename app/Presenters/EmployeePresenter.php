<?php

namespace App\Presenters;

use App\Transformers\EmployeeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EmployeePresenter
 *
 * @package namespace App\Presenters;
 */
class EmployeePresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new EmployeeTransformer();
    }
}
