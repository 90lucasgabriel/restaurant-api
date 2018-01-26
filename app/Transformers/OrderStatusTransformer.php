<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class OrderStatusTransformer
 * @package namespace App\Transformers;
 */
class OrderStatusTransformer extends TransformerAbstract
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
    protected $availableIncludes    = ['order'];
    
    /**
     * Transform the \OrderStatus entity
     * @param \OrderStatus $model
     *
     * @return array
     */
    public function transform(OrderStatus $model)
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
    public function includeOrder(OrderStatus $model){
        return $this->item($model->order, new OrderTransformer());  
    }
}