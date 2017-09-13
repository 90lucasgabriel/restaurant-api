<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Branch extends Model implements Transformable
{
    use TransformableTrait;

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
        'complement', 
        'zipcode',
        'neighborhood', 
        'city',
        'state', 
        'country' 
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function branchImages(){
        return $this->hasMany(BranchImage::class);
    }

    public function branchUserFavorites(){
        return $this->belongsToMany(UserBranchFavorite::class, 'user_branch_favorites', 'branch_id', 'user_id')->withTimestamps();
    }

    public function branchJobs(){
        return $this->belongsToMany(BranchJob::class, 'branches_jobs', 'job_id', 'branch_id')->withTimestamps();
    }

}