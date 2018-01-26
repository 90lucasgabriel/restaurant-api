<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OrderDetail;

/**
 * Class OrderDetailTransformer
 * @package namespace App\Transformers;
 */
class OrderDetailTransformer extends TransformerAbstract
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
    protected $availableIncludes = ['diningtable','product', 'orderDetailType', 'orderDetailStatus', 'menu'];

    /**
     * Transform the \OrderDetail entity
     * @param \OrderDetail $model
     * @return array
     */
    public function transform(OrderDetail $model)
    {
        return [
            'id'              => (int) $model->id,
            'order_id'        => (int) $model->order_id,
            'menu_id'         => (int) $model->menu_id,
            'product_id'      => (int) $model->product_id,
            'diningtable_id'  => (int) $model->diningtable_id,
            'order_detail_status_id' => (int) $model->order_detail_status_id,
            'order_detail_type_id'   => (int) $model->order_detail_type_id,
            
            'price_person'    => $model->price_person,
            'price_alacarte'  => $model->price_alacarte,
            'quantity'        => $model->quantity,
            'comment'         => $model->comment,
                        
            'created_at'      => $model->created_at,
            'updated_at'      => $model->updated_at
        ];
    }
    /**
     * Includes detail information.
     * @param OrderDetail $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeProduct(OrderDetail $model){
        return $this->item($model->product, new ProductTransformer());
    }

    /**
     * Includes diningtable information.
     * @param OrderDetail $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeDiningtable(OrderDetail $model){
        return $this->item($model->diningtable, new DiningtableTransformer());
    }

    /**
     * Includes order information.
     * @param OrderDetail $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeOrder(OrderDetail $model){
        return $this->item($model->order, new OrderTransformer());
    }
    
    /**
     * Includes menu information.
     * @param OrderDetail $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeMenu(OrderDetail $model){
        return $this->item($model->menu, new MenuTransformer());
    }
    
    /**
     * Includes status information.
     * @param OrderDetail $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeOrderDetailStatus(OrderDetail $model){
        return $this->item($model->orderDetailStatus, new OrderDetailStatusTransformer());
    }
        
    /**
     * Includes type information.
     * @param OrderDetail $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeOrderDetailType(OrderDetail $model){
        return $this->item($model->orderDetailType, new OrderDetailTypeTransformer());
    } 
}
