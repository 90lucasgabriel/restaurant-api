<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Client;

/**
 * Class ClientTransformer
 * @package namespace App\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{


    protected $defaultIncludes = ['user'];
    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(Client $model)
    {
        return [
            'id'           => (int) $model->id,
            'user_id'      => (int) $model->user_id,
            
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
            'country'      => $model->country,

            'created_at'   => $model->created_at,
            'updated_at'   => $model->updated_at
        ];
    }

    public function includeUser(Client $model){
        return $this->item($model->user, new UserTransformer());
    }
}
