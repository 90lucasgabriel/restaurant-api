<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\JobPresenter;
use App\Repositories\JobRepository;
use App\Models\Job;
use App\Validators\JobValidator;

/**
 * Class JobRepositoryEloquent
 * @package namespace App\Repositories;
 */
class JobRepositoryEloquent extends BaseRepository implements JobRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Job::class;
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
        return JobPresenter::class;
    }
}
