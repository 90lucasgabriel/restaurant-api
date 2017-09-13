<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\BranchJobEmployeePresenter;
use App\Repositories\BranchJobEmployeeRepository;
use App\Models\BranchJobEmployee;
use App\Validators\BranchJobEmployeeValidator;

/**
 * Class BranchJobEmployeeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BranchJobEmployeeRepositoryEloquent extends BaseRepository implements BranchJobEmployeeRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BranchJobEmployee::class;
    }

    public function lists($column, $key=null){
        return $this->model->lists($column, $key);
    }
    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return BranchJobEmployeePresenter::class;
    }
}
