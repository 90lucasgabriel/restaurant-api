<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\EmployeePresenter;
use App\Repositories\EmployeeRepository;
use App\Models\Employee;
use App\Validators\EmployeeValidator;

/**
 * Class EmployeeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EmployeeRepositoryEloquent extends BaseRepository implements EmployeeRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Employee::class;
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
        return EmployeePresenter::class;
    }
}
