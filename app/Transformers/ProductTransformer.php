<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use App\Models\Product;

/**
 * Class ProductTransformer
 * 
 * @package namespace App\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{
    /**
     * Default models includes
     *
     * @var array
     */
    protected $defaultIncludes  = ['category'];

    /**
     * Available models includes
     *
     * @var array
     */
    protected $availableIncludes = ['company','menu'];

    /**
     * Transform the \Product entity
     * @param \Product $model
     *
     * @return array
     */
    public function transform(Product $model)
    {
        $product =  [
            'id'            => (int) $model->id,
            'company_id'    => (int) $model->company_id,
            'category_id'   => (int) $model->category_id,
            'name'          => $model->name,
            'description'   => $model->description,
            'image'         => $model->image,
        ];
        
        if (isset($model->pivot->price)) {
            $product['price'] = $model->pivot->price;
        }
        
        return $product;
    }

    /**
     * Include company's information
     *
     * @param Company $model
     * @return ['data'=>[App\Models\Company]]
     */
    public function includeCompany(Product $model){
        return $this->item($model->company, new CompanyTransformer());    
    }

    /**
     * Include category's information
     *
     * @param Category $model
     * @return ['data'=>[App\Models\Category]]
     */
    public function includeCategory(Product $model){
        return $this->item($model->category, new CategoryTransformer());
    }
    
    /**
     * Include menu's information
     *
     * @param Menu $model
     * @return ['data'=>[App\Models\Menu]]
     */
     public function includeMenu(Product $model){
        return $this->collection($model->menu, new MenuTransformer());
    }
}