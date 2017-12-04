<?php

namespace App\Transformers;

use Illuminate\Database\Eloquent\Collection;
use League\Fractal\TransformerAbstract;
use App\Models\Company;

/**
 * Class CompanyTransformer
 * 
 * @package namespace App\Transformers;
 */
class CompanyTransformer extends TransformerAbstract
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
    protected $availableIncludes = ['branches'];

    /**
     * Transform the \Company entity
     * @param \Company $model
     *
     * @return array
     */
    public function transform(Company $model)
    {
        return [
            'id'           => (int) $model->id,
            'name'         => $model->name,
            'description'  => $model->description,
            'cnpj'         => $model->cnpj,
            'avatar'       => $model->avatar,

            'website'      => $model->website,
            'facebook'     => $model->facebook,
            'twitter'      => $model->twitter,
            'instagram'    => $model->instagram,
        ];
    }

    /**
     * Include company's information
     *
     * @param Company $model
     * @return ['data'=>[App\Models\Company]]
     */
    public function includeBranches(Company $model){
        return $this->collection($model->branches, new BranchTransformer());
    }
    

}