<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\OrderDetailTypePresenter;
use App\Repositories\OrderDetailTypeRepository;
use App\Models\OrderDetailType;
use App\Validators\OrderDetailTypeValidator;

/**
 * Class OrderDetailTypeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OrderDetailTypeRepositoryEloquent extends BaseRepository implements OrderDetailTypeRepository
{
    /**
     * Verify if skip Presenter
     * @var boolean
     */
    protected $skipPresenter = false;

    protected $fieldSearchable = [
        'id',
        'name'          => 'like',
        'description'   => 'like'
    ];

    /**
     * Specify Model class name
     * @return string
     */
    public function model()
    {
        return OrderDetailType::class;
    }   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return OrderDetailTypePresenter::class;
    }
}
