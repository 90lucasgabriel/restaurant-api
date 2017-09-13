<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\BranchImage;

class BranchImageTransformer extends TransformerAbstract
{

    public function transform(BranchImage $model)
    {
        return [
            'id'         => (int) $model->id,
            'branch_id'  => $model->branch_id,
            'url'        => $model->url,
            'description'=> $model->description,
            'index'      => $model->index
        ];
    }


}