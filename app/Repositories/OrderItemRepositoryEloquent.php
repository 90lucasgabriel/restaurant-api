<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrderItemRepository;
use App\Presenters\OrderItemPresenter;
use App\Models\OrderItem;

/**
 * Class OrderItemRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OrderItemRepositoryEloquent extends BaseRepository implements OrderItemRepository
{
    /**
     * Verify if skip Presenter
     *
     * @var boolean
     */
    protected $skipPresenter = false;

    protected $fieldSearchable = [
        'order_id',
        'menu_id',
        'product_id',
        'diningtable_id',
        'order_item_status_id',
        'order_item_type_id',
        
        'price_person',
        'price_alacarte',
        'quantity',
        'comment' => 'like'
    ];
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderItem::class;
    }

    /**
     * Retrieve data array for populate field select
     *
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
     *
     * @return void
     */
    public function presenter(){
        return OrderItemPresenter::class;
    }
}
