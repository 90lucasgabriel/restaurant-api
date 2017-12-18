<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MenuTimeRepository;
use App\Presenters\MenuTimePresenter;
use App\Models\MenuTime;

/**
 * Class MenuTimeRepositoryEloquent
 * 
 * @package namespace App\Repositories;
 */
class MenuTimeRepositoryEloquent extends BaseRepository implements MenuTimeRepository
{
    /**
     * Verify if skip Presenter
     *
     * @var boolean
     */
    protected $skipPresenter = false;

    protected $fieldSearchable = [
        'id',
        'menu_id',
        'day',
        'time_start',
        'time_end'
    ];
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MenuTime::class;
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
        return MenuTimePresenter::class;
    }
}