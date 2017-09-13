<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Company extends Model implements Transformable
{
    use TransformableTrait;
    
    protected $fillable = [
        'name',
        'description',
        'cpf',
        'cnpj',
        'avatar',
        
        'phone_1', 
        'phone_2',
        'email_1',
        'email_2',
        'website',
        'facebook',
        'twitter',
        'instagram'      
    ];

    public function branches(){
        return $this->hasMany(Branch::class);
    }
}
