<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class MenuBranch extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'company_id',
        'menu_id',
        'branch_id'
    ];

    /**
     * Menu Relationship 1-1
     *
     * @return void
     */
    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    /**
     * Branch Relationship 1-1
     *
     * @return void
     */
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}