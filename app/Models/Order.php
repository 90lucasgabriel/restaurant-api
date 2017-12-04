<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'diningtable_id',
        'total', 
        'status',
    ];

    /**
     * Diningtable Relationship 1-1
     *
     * @return void
     */
    public function diningtable(){
        return $this->belongsTo(Diningtable::class);
    }
}
