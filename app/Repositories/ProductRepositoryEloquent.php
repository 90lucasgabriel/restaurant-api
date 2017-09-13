<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\ProductPresenter;
use App\Repositories\ProductRepository;
use App\Models\Product;
use App\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
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
        return ProductPresenter::class;
    }
}
