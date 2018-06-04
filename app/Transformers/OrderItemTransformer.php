<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OrderItem;

/**
 * Class OrderItemTransformer
 * @package namespace App\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{
    /**
     * Default models includes
     * @var array
     */
    protected $defaultIncludes  = [];

    /**
     * Available models includes
     * @var array
     */
    protected $availableIncludes = ['diningtable','product', 'orderItemType', 'orderItemStatus', 'menu'];

    /**
     * Transform the \OrderItem entity
     * @param \OrderItem $model
     * @return array
     */
    public function transform(OrderItem $model)
    {
        return [
            'id'              => (int) $model->id,
            'order_id'        => (int) $model->order_id,
            'menu_id'         => (int) $model->menu_id,
            'product_id'      => (int) $model->product_id,
            'diningtable_id'  => (int) $model->diningtable_id,
            'order_item_status_id' => (int) $model->order_item_status_id,
            'order_item_type_id'   => (int) $model->order_item_type_id,
            
            'price_person'    => $model->price_person,
            'price_alacarte'  => $model->price_alacarte,
            'quantity'        => $model->quantity,
            'comment'         => $model->comment,
                        
            'created_at'      => $model->created_at,
            'updated_at'      => $model->updated_at
        ];
    }
    /**
     * Includes item information.
     * @param OrderItem $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeProduct(OrderItem $model){
        return $this->item($model->product, new ProductTransformer());
    }

    /**
     * Includes diningtable information.
     * @param OrderItem $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeDiningtable(OrderItem $model){
        return $this->item($model->diningtable, new DiningtableTransformer());
    }

    /**
     * Includes order information.
     * @param OrderItem $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeOrder(OrderItem $model){
        return $this->item($model->order, new OrderTransformer());
    }
    
    /**
     * Includes menu information.
     * @param OrderItem $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeMenu(OrderItem $model){
        return $this->item($model->menu, new MenuTransformer());
    }
    
    /**
     * Includes status information.
     * @param OrderItem $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeOrderItemStatus(OrderItem $model){
        return $this->item($model->orderItemStatus, new OrderItemStatusTransformer());
    }
        
    /**
     * Includes type information.
     * @param OrderItem $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeOrderItemType(OrderItem $model){
        return $this->item($model->orderItemType, new OrderItemTypeTransformer());
    } 
}
