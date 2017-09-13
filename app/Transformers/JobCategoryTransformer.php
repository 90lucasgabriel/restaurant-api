<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\JobCategory;

class JobCategoryTransformer extends TransformerAbstract
{

    public function transform(JobCategory $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'description'=> $model->description
        ];
    }


}