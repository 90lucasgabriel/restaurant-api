<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderDetail extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'order_id',
        'menu_id',
        'product_id',
        'diningtable_id',
        'order_detail_status_id',
        'order_detail_type_id',
        
        'price_person',
        'price_alacarte',
        'quantity',
        'comment'
    ];

    /**
     * Diningtable Relationship 1-n
     * @return void
     */
    public function diningtable(){
        return $this->belongsTo(Diningtable::class);
    }

    /**
     * Product Relationship 1-n
     * @return void
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }

    /**
     * Order Relationship 1-n
     * @return void
     */
    public function order(){
        return $this->belongsTo(Order::class);
    }

    /**
     * Menu Relationship 1-n
     * @return void
     */
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    
    /**
     * OrderDetailStatus Relationship 1-1
     * @return void
     */
    public function orderDetailStatus(){
        return $this->belongsTo(OrderDetailStatus::class);
    }
        
    /**
     * OrderDetailType Relationship 1-1
     * @return void
     */
    public function orderDetailType(){
        return $this->belongsTo(OrderDetailType::class);
    }
}