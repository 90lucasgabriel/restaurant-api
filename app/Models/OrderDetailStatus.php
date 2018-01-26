<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class OrderDetailStatus
 * @package namespace App\Models;
 */
class OrderDetailStatus extends Model implements Transformable
{
    use TransformableTrait;
    
    protected $table='order_detail_status';

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
     * OrderDetail Relationship 1-1
     * @return ['data'=>[App\Models\OrderDetail]]
     */
    public function orderDetail(){
        return $this->belongsTo(OrderDetail::class);
    }
}