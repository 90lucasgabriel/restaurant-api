<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;

class BranchTransformer extends TransformerAbstract
{
    protected $defaultIncludes   = ['company'];
    protected $availableIncludes = ['images'];

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
            'complement'   => $model->complement,
            'zipcode'      => $model->zipcode,
            'neighborhood' => $model->neighborhood,
            'city'         => $model->city,
            'state'        => $model->state,
            'country'      => $model->country
            //'created_at'    => $model->created_at,
            //'updated_at'    => $model->updated_at
        ];
    }


    public function includeCompany(Branch $model){
         return $this->item($model->company, new CompanyTransformer());
    }

    public function includeImages(Branch $model){
        return $this->collection($model->branchImages, new BranchImageTransformer());
    }


}