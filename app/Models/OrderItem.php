<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderItem extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'service_id',
        'order_id', 
        'price', 
        'quantity',
    ];

    /**
     * Service Relationship
     *
     * @return void
     */
    public function service(){
        return $this->belongsTo(Service::class);
    }

    /**
     * Order Relationship
     *
     * @return void
     */
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
