<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\BranchJobPresenter;
use App\Repositories\BranchJobRepository;
use App\Models\BranchJob;
use App\Validators\BranchJobValidator;

/**
 * Class BranchJobRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BranchJobRepositoryEloquent extends BaseRepository implements BranchJobRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BranchJob::class;
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
        return BranchJobPresenter::class;
    }
}
