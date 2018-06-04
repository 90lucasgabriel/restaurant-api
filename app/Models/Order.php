<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'company_id',
        'branch_id',
        'diningtable_id',
        'order_status_id',
        'total', 
    ];

    /**
     * Company Relationship 1-1
     * @return void
     */
    public function company(){
        return $this->belongsTo(Company::class);
    }

    /**
     * Branch Relationship 1-1
     * @return void
     */
    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    /**
     * Diningtable Relationship 1-1
     * @return void
     */
    public function diningtable(){
        return $this->belongsTo(Diningtable::class);
    }
        
    /**
     * OrderStatus Relationship 1-1
     * @return void
     */
    public function orderStatus(){
        return $this->belongsTo(OrderStatus::class);
    }

    /**
     * OrderItem Relationship 1-n
     * @return ['data'=>[App\Models\OrderItem]]
     */
    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }
}
