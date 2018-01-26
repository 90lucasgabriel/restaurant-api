<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Diningtable;

/**
 * Class DiningtableTransformer
 * 
 * @package namespace App\Transformers;
 */
class DiningtableTransformer extends TransformerAbstract
{
    /**
     * Default models includes
     *
     * @var array
     */
    protected $defaultIncludes  = [];

    /**
     * Available models includes
     *
     * @var array
     */
    protected $availableIncludes = ['branch'];

    /**
     * Transform the \Diningtable entity
     * @param \Diningtable $model
     * @return array
     */
    public function transform(Diningtable $model)
    {
        return [
            'id'           => (int) $model->id,
            'branch_id'   => (int) $model->branch_id,
        
            'code'         => (int) $model->code,
            'description'  => $model->description
        ];
    }

    /**
     * Include category's information
     *
     * @param Branch $model
     * @return ['data'=>[App\Models\Branch]]
     */
    public function includeBranch(Diningtable $model){
        return $this->item($model->branch, new BranchTransformer());
    }
}