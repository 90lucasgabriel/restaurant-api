<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class MenuProduct extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'menu_id',
        'product_id',
        
        'price'
    ];

    /**
     * Menu Relationship n-n
     *
     * @return void
     */
    public function menu(){
        return $this->HasMany(Menu::class);
    }

    /**
     * Product Relationship n-n
     *
     * @return void
     */
    public function product(){
        return $this->HasMany(Product::class);
    }
}