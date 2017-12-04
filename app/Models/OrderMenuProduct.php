<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderMenuProduct extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'order_id',
        'menu_product_id',
        'status_id',
        
        'quantity',
        'comment'
    ];

    /**
     * Order Relationship 1-n
     *
     * @return void
     */
    public function order(){
        return $this->belongsTo(Order::class);
    }

    /**
     * Menu Relationship 1-n
     *
     * @return void
     */
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    
    /**
     * Status Relationship 1-1
     *
     * @return void
     */
    public function status(){
        return $this->belongsTo(Status::class);
    }
}