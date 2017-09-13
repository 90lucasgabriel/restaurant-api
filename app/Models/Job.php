<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Job extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'id',
        'job_category_id',
        'name',
        'description'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function jobBranches(){
        return $this->belongsToMany(BranchJob::class, 'branches_jobs', 'branch_id', 'job_id')->withTimestamps();
    }

}
