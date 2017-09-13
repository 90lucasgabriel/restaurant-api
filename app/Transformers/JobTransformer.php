<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Job;
use Illuminate\Database\Eloquent\Collection;

class JobTransformer extends TransformerAbstract
{
    //protected $defaultIncludes   = ['company'];
    protected $availableIncludes = ['category'];

    public function transform(Job $model)
    {
        return [
            'id'              => (int) $model->id,
            'job_category_id' => $model->job_category_id,
            'name'            => $model->name,
            'description'     => $model->description
        ];
    }


    public function includeCategory(Job $model){
         return $this->item($model->category, new JobCategoryTransformer());
    }


}