<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\BranchJob;
use Illuminate\Database\Eloquent\Collection;

class BranchJobTransformer extends TransformerAbstract
{
    //protected $defaultIncludes   = ['company'];
    protected $availableIncludes = ['branch','job'];

    public function transform(BranchJob $model)
    {
        return [
            'id'         => (int) $model->id,
            'branch_id'  => (int) $model->branch_id,
            'job_id'     => (int) $model->job_id,
            'price'      => $model->price,
            'price_sale' => $model->price_sale,
            'duration'   => $model->duration
        ];
    }


    public function includeBranch(BranchJob $model){
         return $this->item($model->branch, new BranchTransformer());
    }

    public function includeJob(BranchJob $model){
        return $this->item($model->job, new JobTransformer());
    }


}