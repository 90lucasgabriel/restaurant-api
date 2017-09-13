<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class BranchImage extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'branch_id',
        'url',
        'description',
        'index',
    ];

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
