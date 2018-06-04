<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrderItemStatusRepository;
use App\Presenters\OrderItemStatusPresenter;
use App\Models\OrderItemStatus;

/**
 * Class OrderItemStatusRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OrderItemStatusRepositoryEloquent extends BaseRepository implements OrderItemStatusRepository
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
        return OrderItemStatus::class;
    }

    /**
     * Retrieve data array for populate field select
     * @param string $column
     * @param string|null $key
     *
     * @return \Illuminate\Support\Collection|array
     */
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

    /**
     * Presenter
     * @return void
     */
    public function presenter(){
        return OrderItemStatusPresenter::class;
    }
}
