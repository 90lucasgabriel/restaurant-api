<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderItemType extends Model implements Transformable
{
    use TransformableTrait;

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
     * OrderItem Relationship 1->1
     * @return ['data'=>[App\Models\Company]]
     */
    public function orderItem(){
        return $this->belongsTo(OrderItem::class);
    }
}