<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OrderItemStatus;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class OrderItemStatusTransformer
 * @package namespace App\Transformers;
 */
class OrderItemStatusTransformer extends TransformerAbstract
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
    protected $availableIncludes    = ['order', 'item'];
    
    /**
     * Transform the \OrderItemStatus entity
     * @param \OrderItemStatus $model
     *
     * @return array
     */
    public function transform(OrderItemStatus $model)
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
    public function includeOrder(OrderItemStatus $model){
        return $this->item($model->order, new OrderTransformer());  
    }

    /**
     * Includes OrderItem information
     * @param OrderItem $model
     * @return ['data'=>[App\Models\OrderItem]]
     */
    public function includeItem(OrderItemStatus $model){
        return $this->item($model->orderItem, new OrderItemTransformer());
    }
}