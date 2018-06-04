<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class OrderItemStatus
 * @package namespace App\Models;
 */
class OrderItemStatus extends Model implements Transformable
{
    use TransformableTrait;
    
    protected $table='order_item_status';

    /**
     * Fields to create new model mannualy.
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    /**
     * Order Relationship 1-1
     * @return ['data'=>[App\Models\Order]]
     */
    public function order(){
        return $this->belongsTo(Order::class);
    }

    /**
     * OrderItem Relationship 1-1
     * @return ['data'=>[App\Models\OrderItem]]
     */
    public function orderItem(){
        return $this->belongsTo(OrderItem::class);
    }
}