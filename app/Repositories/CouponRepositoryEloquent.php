<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CouponRepository;
use App\Models\Coupon;
use App\Presenters\CouponPresenter;
use App\Validators\CouponValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class CouponRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CouponRepositoryEloquent extends BaseRepository implements CouponRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Coupon::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return CouponPresenter::class;
    }

    public function findByCode($code){
        $result = $this->model
            ->where('code', $code)
            ->where('used', 0)
            ->first();

        if($result){
            return $this->parserResult($result);
        }
        else{
            throw (new ModelNotFoundException)->setModel(get_class($this->model));
        }
    }
}
