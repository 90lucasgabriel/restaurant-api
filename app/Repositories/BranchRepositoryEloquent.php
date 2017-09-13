<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\BranchPresenter;
use App\Repositories\BranchRepository;
use App\Models\Branch;
use App\Validators\BranchValidator;

/**
 * Class BranchRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BranchRepositoryEloquent extends BaseRepository implements BranchRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Branch::class;
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
        return BranchPresenter::class;
    }
}
