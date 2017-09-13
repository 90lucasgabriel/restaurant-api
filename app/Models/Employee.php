<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Employee extends Model implements Transformable
{
    use TransformableTrait;
    
    protected $fillable = [
        'user_id',
        'branch_id',
        
        'cpf',
        'cnpj',
        'phone_1', 
        'phone_2',
        
        'address',
        'complement', 
        'zipcode',
        'neighborhood', 
        'city',
        'state', 
        'country' 
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
