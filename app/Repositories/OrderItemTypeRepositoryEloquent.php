<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\OrderItemTypePresenter;
use App\Repositories\OrderItemTypeRepository;
use App\Models\OrderItemType;
use App\Validators\OrderItemTypeValidator;

/**
 * Class OrderItemTypeRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OrderItemTypeRepositoryEloquent extends BaseRepository implements OrderItemTypeRepository
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
        return OrderItemType::class;
    }   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return OrderItemTypePresenter::class;
    }
}
