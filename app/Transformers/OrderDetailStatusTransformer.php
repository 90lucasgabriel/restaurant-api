<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OrderDetailStatus;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class OrderDetailStatusTransformer
 * @package namespace App\Transformers;
 */
class OrderDetailStatusTransformer extends TransformerAbstract
{
    /**
     * Default models includes
     * @var array
     */
    protected $defaultIncludes      = [];
    
    /**
     * Available models includes
     * @var array
     */
    protected $availableIncludes    = ['order', 'detail'];
    
    /**
     * Transform the \OrderDetailStatus entity
     * @param \OrderDetailStatus $model
     *
     * @return array
     */
    public function transform(OrderDetailStatus $model)
    {
        return [
            'id'            => (int) $model->id,
            'name'          => $model->name,
            'description'   => $model->description
        ];
    }
    
    /**
     * Includes Order information
     * @param Order $model
     * @return ['data'=>[App\Models\Order]]
     */
    public function includeOrder(OrderDetailStatus $model){
        return $this->item($model->order, new OrderTransformer());  
    }

    /**
     * Includes OrderDetail information
     * @param OrderDetail $model
     * @return ['data'=>[App\Models\OrderDetail]]
     */
    public function includeDetail(OrderDetailStatus $model){
        return $this->item($model->orderDetail, new OrderDetailTransformer());
    }
}