<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Employee;

/**
 * Class EmployeeTransformer
 * @package namespace App\Transformers;
 */
class EmployeeTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['user'];
    /**
     * Transform the \Employee entity
     * @param \Employee $model
     *
     * @return array
     */
    public function transform(Employee $model)
    {
        return [
            'id'           => (int) $model->id,
            'user_id'      => (int) $model->user_id,
            'branch_id'    => (int) $model->branch_id,
            
            'cpf'          => $model->cpf,
            'cnpj'         => $model->cnpj,
            'phone_1'      => $model->phone_1,
            'phone_2'      => $model->phone_2,
            
            'address'      => $model->address,
            'complement'   => $model->complement,
            'zipcode'      => $model->zipcode,
            'neighborhood' => $model->neighborhood,
            'city'         => $model->city,
            'state'        => $model->state,
            'country'      => $model->country
        ];
    }

    public function includeUser(Employee $model){
        return $this->item($model->user, new UserTransformer());
    }
}
