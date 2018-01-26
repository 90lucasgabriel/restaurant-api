<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product
 * 
 * @package namespace App\Models;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Fields to create new model mannualy.
     * @var array
     */
    protected $fillable = [
        'company_id',
        'category_id',
        
        'name',
        'description',
        'image'
    ];

    /**
     * Parent Company Relationship 1->1
     * @return ['data'=>[App\Models\Company]]
     */
    public function company(){
        return $this->belongsTo(Company::class);
    }   
    
    /**
     * Category Relationship 1-1
     * @return ['data'=>[App\Models\Category]]
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }
     
    /**
     * Menu Relationship n-n
     * @return ['data'=>[App\Models\Menu]]
     */
    public function menu(){
        return $this->belongsToMany(Menu::class)
            ->withPivot('price')
            ->withTimestamps();
    }
}