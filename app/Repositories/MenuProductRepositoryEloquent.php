<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MenuProductRepository;
use App\Presenters\MenuProductPresenter;
use App\Models\MenuProduct;

/**
 * Class MenuProductRepositoryEloquent
 * 
 * @package namespace App\Repositories;
 */
class MenuProductRepositoryEloquent extends BaseRepository implements MenuProductRepository
{
    /**
     * Verify if skip Presenter
     *
     * @var boolean
     */
    protected $skipPresenter = false;

    protected $fieldSearchable = [
        'menu_id',
        'product_id',
        
        'price'         => 'like'
    ];
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MenuProduct::class;
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
        return MenuProductPresenter::class;
    }
}