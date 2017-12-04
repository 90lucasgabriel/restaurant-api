<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Category
 * 
 * @package namespace App\Models;
 */
class Category extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Fields to create new model mannualy.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'parent_id',

        'name',
        'description',
        'image'
    ];

    /**
     * Parent Company Relationship 1->1
     *
     * @return ['data'=>[App\Models\Company]]
     */
    public function company(){
        return $this->belongsTo(Company::class);
    }   

    /**
     * Parent Category Relationship 1->1
     *
     * @return ['data'=>[App\Models\Category]]
     */
    public function parent(){
        return $this->belongsTo(Category::class);
    }    
}