<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Branch;

/**
 * Class BranchTransformer
 * 
 * @package namespace App\Transformers;
 */
class BranchTransformer extends TransformerAbstract
{
    /**
     * Default models includes
     *
     * @var array
     */
    protected $defaultIncludes  = ['company'];

    /**
     * Available models includes
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * Transform the \Branch entity
     * @param \Branch $model
     *
     * @return array
     */
    public function transform(Branch $model)
    {
        return [
            'id'           => (int) $model->id,
            'company_id'   => (int) $model->company_id,
        
            'phone_1'      => $model->phone_1,
            'phone_2'      => $model->phone_2,
            'email_1'      => $model->email_1,
            'email_2'      => $model->email_2,
            'website'      => $model->website,
            'facebook'     => $model->facebook,
            'twitter'      => $model->twitter,
            'instagram'    => $model->instagram,
            
            'address'      => $model->address,
            'number'       => $model->number,
            'complement'   => $model->complement,
            'zipcode'      => $model->zipcode,
            'neighborhood' => $model->neighborhood,
            'city'         => $model->city,
            'state'        => $model->state,
            'country'      => $model->country
        ];
    }

    /**
     * Include category's information
     *
     * @param Category $model
     * @return ['data'=>[App\Models\Category]]
     */
    public function includeCompany(Branch $model){
        return $this->item($model->company, new CompanyTransformer());
    }
}