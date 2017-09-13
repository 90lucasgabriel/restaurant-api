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
    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'name'        => 'like',
        'description' => 'like'
    ];

    public function getByIdAndDeliveryman($orderId, $deliverymanId){
        $result = $this
            ->model
            ->where('id', $orderId)
            ->where('user_deliveryman_id', $deliverymanId)
            ->first();
        
        if($result){
            return $this->parserResult($result);
        }

        throw (new ModelNotFoundException())->setModel(get_class($this->model));
    }

    public function getByIdAndClient($orderId, $clientId){
        $result = $this
            ->model
            ->where('id', $orderId)
            ->where('client_id', $clientId)
            ->first();
        
        if($result){
            return $this->parserResult($result);
        }

        throw (new ModelNotFoundException())->setModel($this->model());
    }

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
