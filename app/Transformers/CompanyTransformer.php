<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

class CompanyTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['branches'];

    public function transform(Company $model)
    {
        return [
            'id'           => (int) $model->id,
            'name'         => $model->name,
            'description'  => $model->description,
            'cpf'          => $model->cpf,
            'cnpj'         => $model->cnpj,
            'avatar'       => $model->avatar,

            'phone_1'      => $model->phone_1,
            'phone_2'      => $model->phone_2,
            'email_1'      => $model->email_1,
            'email_2'      => $model->email_2,
            'website'      => $model->website,
            'facebook'     => $model->facebook,
            'twitter'      => $model->twitter,
            'instagram'    => $model->instagram,
            //'created_at'    => $model->created_at,
            //'updated_at'    => $model->updated_at
        ];
    }

    
    public function includeBranches(Company $model){
        return $this->collection($model->branches, new BranchTransformer());
    }
    

}