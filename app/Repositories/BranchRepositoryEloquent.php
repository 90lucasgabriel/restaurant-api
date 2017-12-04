<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BranchRepository;
use App\Presenters\BranchPresenter;
use App\Models\Branch;

/**
 * Class BranchRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BranchRepositoryEloquent extends BaseRepository implements BranchRepository
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
        'phone_1'      => 'like', 
        'phone_2'      => 'like',
        'email_1'      => 'like',
        'email_2'      => 'like',
        'website'      => 'like',
        'facebook'     => 'like',
        'twitter'      => 'like',
        'instagram'    => 'like',
        
        'address'      => 'like',
        'number',
        'complement'   => 'like', 
        'zipcode'      => 'like',
        'neighborhood' => 'like', 
        'city'         => 'like',
        'state', 
        'country'      => 'like' 
    ];
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Branch::class;
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
        return BranchPresenter::class;
    }
}
