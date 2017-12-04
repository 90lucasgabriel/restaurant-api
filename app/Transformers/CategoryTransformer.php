<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CategoryTransformer
 * @package namespace App\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{
        /**
     * Default models includes
     *
     * @var array
     */
    protected $defaultIncludes      = [];
    
    /**
     * Available models includes
     *
     * @var array
     */
    protected $availableIncludes    = ['company', 'parent'];
    
    /**
     * Transform the \Category entity
     * @param \Category $model
     *
     * @return array
     */
    public function transform(Category $model)
    {
        return [
            'id'            => (int) $model->id,
            'company_id'    => (int) $model->company_id,
            'parent_id'     => (int) $model->parent_id,
            'name'          => $model->name,
            'description'   => $model->description,
            'image'         => $model->image
        ];
    }
    
    /**
     * Include company's information
     *
     * @param Company $model
     * @return ['data'=>[App\Models\Company]]
     */
    public function includeCompany(Category $model){
        return $this->item($model->company, new CompanyTransformer());
        
    }

    /**
     * Include parent category's information
     *
     * @param Category $model
     * @return ['data'=>[App\Models\Category]]
     */
    public function includeParent(Category $model){
        if($model->parent != null){
            return $this->item($model->parent, new CategoryTransformer());
        }
    }
}