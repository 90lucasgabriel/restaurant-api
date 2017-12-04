<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Menu;

/**
 * Class MenuTransformer
 * 
 * @package namespace App\Transformers;
 */
class MenuTransformer extends TransformerAbstract
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
    protected $availableIncludes = ['company'];

    /**
     * Transform the \Menu entity
     * @param \Menu $model
     *
     * @return array
     */
    public function transform(Menu $model)
    {
        return [
            'id'            => (int) $model->id,
            'company_id'    => (int) $model->company_id,
            'name'          => $model->name,
            'description'   => $model->description
        ];
    }

    /**
     * Include company's information
     *
     * @param Company $model
     * @return ['data'=>[App\Models\Company]]
     */
    public function includeCompany(Menu $model){
        return $this->item($model->company, new CompanyTransformer());    
    }
}