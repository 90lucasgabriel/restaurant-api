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
class Branch extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Fields to create new model mannualy.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        
        'phone_1', 
        'phone_2',
        'email_1',
        'email_2',
        'website',
        'facebook',
        'twitter',
        'instagram',
        
        'address',
        'number',
        'complement', 
        'zipcode',
        'neighborhood', 
        'city',
        'state', 
        'country' 
    ];

    /**
     * Company Relationship 1->1
     *
     * @return ['data'=>[App\Models\Branch]]
     */
    public function company(){
        return $this->belongsTo(Company::class);
    }

    /**
     * Menu Relationship 1-n
     *
     * @return ['data'=>[App\Models\Menu]]
     */
    public function menus(){
        return $this->belongsToMany(Menu::class)->withTimestamps();
    }

    /**
     * Diningtable Relationship 1-n
     *
     * @return ['data'=>[App\Models\Diningtable]]
     */
    public function diningtables(){
        return $this->belongsToMany(Diningtable::class)->withTimestamps();
    }
}