<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\DiningtablePresenter;
use App\Repositories\DiningtableRepository;
use App\Models\Diningtable;
use App\Validators\DiningtableValidator;

/**
 * Class DiningtableRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DiningtableRepositoryEloquent extends BaseRepository implements DiningtableRepository
{
    /**
     * Verify if skip Presenter
     *
     * @var boolean
     */
    protected $skipPresenter = false;

    protected $fieldSearchable = [
        'id',
        'branch_id',
        'code',
        'description'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Diningtable::class;
    }   

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return DiningtablePresenter::class;
    }
}
