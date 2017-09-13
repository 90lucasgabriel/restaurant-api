<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\ClientPresenter;
use App\Repositories\ClientRepository;
use App\Models\Client;
use App\Validators\ClientValidator;

/**
 * Class ClientRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
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
        return ClientPresenter::class;
    }
}
