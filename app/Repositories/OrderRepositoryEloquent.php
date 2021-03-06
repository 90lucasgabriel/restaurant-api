<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\OrderPresenter;
use App\Repositories\OrderRepository;
use App\Models\Order;
use App\Validators\OrderValidator;

/**
 * Class OrderRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Verify if skip Presenter
     *
     * @var boolean
     */
    protected $skipPresenter = false;

    protected $fieldSearchable = [
        'id',
        'company_id',
        'branch_id',
        'diningtable_id',
        'status',

        'total'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return OrderPresenter::class;
    }
}
