<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class MenuTime extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id',
        'menu_id',
        'day',
        'time_start',
        'time_end'
    ];

    /**
     * Menu Relationship 1-1
     *
     * @return void
     */
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}