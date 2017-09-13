<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\CompanyPresenter;
use App\Repositories\CompanyRepository;
use App\Models\Company;
use App\Validators\CompanyValidator;

/**
 * Class CompanyRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CompanyRepositoryEloquent extends BaseRepository implements CompanyRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Company::class;
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
        return CompanyPresenter::class;
    }
}
