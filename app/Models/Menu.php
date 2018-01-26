<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Menu
 * @package namespace App\Models;
 */
class Menu extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Fields to create new model mannualy.
     * @var array
     */
    protected $fillable = [
        'id',
        'company_id',
        
        'name',
        'description',

        'price_person',
        'allow_alacarte'
    ];

    /**
     * Parent Company Relationship 1->1
     * @return ['data'=>[App\Models\Company]]
     */
    public function company(){
        return $this->belongsTo(Company::class);
    }
     
    /**
     * Time Relationship 1->n
     * @return ['data'=>[App\Models\MenuTime]]
     */
    public function time(){
        return $this->hasMany(MenuTime::class);
    }

    /**
     * Product Relationship n-n
     * @return ['data'=>[App\Models\Product]]
     */
    public function product(){
        return $this->belongsToMany(Product::class)
            ->withPivot('price')
            ->withTimestamps();
    }

    /**
     * Branch Relationship 1-n
     * @return ['data'=>[App\Models\Branch]]
     */
    public function branch(){
        return $this->belongsToMany(Branch::class)
            ->withTimestamps();
    }
}