<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Company
 * 
 * @package namespace App\Models;
 */
class Company extends Model implements Transformable
{
    use TransformableTrait;
    
    /**
     * Fields to create new model mannualy.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'cnpj',
        'avatar',
        
        'website',
        'facebook',
        'twitter',
        'instagram'      
    ];

    /**
     * Branches Relationship 1->n
     *
     * @return ['data'=>[App\Models\Branch]]
     */
    public function branches(){
        return $this->hasMany(Branch::class);
    }
}
