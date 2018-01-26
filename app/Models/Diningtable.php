<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Diningtable extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'branch_id',
        'code',
        'description'
    ];

    /**
     * Branch Relationship 1-1
     * @return void
     */
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}