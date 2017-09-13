<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\BranchJobEmployee;
use Illuminate\Database\Eloquent\Collection;

class BranchJobEmployeeTransformer extends TransformerAbstract
{
    protected $defaultIncludes   = ['employee'];
    //protected $availableIncludes = ['branch','job'];

    public function transform(BranchJobEmployee $model)
    {
        return [
            'employee_id'         => (int) $model->employee_id,
            'branch_job_id'       => (int) $model->branch_job_id
        ];
    }


    public function includeEmployee(BranchJobEmployee $model){
         return $this->item($model->employee, new EmployeeTransformer());
    }

    public function includeJob(BranchJobEmployee $model){
        return $this->item($model->job, new JobTransformer());
    }


}