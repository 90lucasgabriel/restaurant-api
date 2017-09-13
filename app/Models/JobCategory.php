<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class JobCategory extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    public function jobs(){
        return $this->hasMany(Job::class);
    }

}
