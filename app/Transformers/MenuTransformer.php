<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
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
    protected $availableIncludes = ['company', 'time', 'branch', 'product'];

    /**
     * Transform the \Menu entity
     * @param \Menu $model
     *
     * @return array
     */
    public function transform(Menu $model)
    {
        $menu = [
            'id'            => (int) $model->id,
            'company_id'    => (int) $model->company_id,
            'name'          => $model->name,
            'description'   => $model->description
        ];

        if (isset($model->pivot->price)) {
            $menu['price'] = $model->pivot->price;
        }

        return $menu;
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
    
    /**
     * Include time's information
     *
     * @param Time $model
     * @return ['data'=>[App\Models\MenuTime]]
     */
    public function includeTime(Menu $model){
        return $this->collection($model->time, new MenuTimeTransformer());    
    }
        
    /**
     * Include products's information
     *
     * @param Time $model
     * @return ['data'=>[App\Models\Product]]
     */
    public function includeProduct(Menu $model){
        return $this->collection($model->product, new ProductTransformer());    
    }
        
    /**
     * Include branch's information
     *
     * @param Time $model
     * @return ['data'=>[App\Models\Branch]]
     */
    public function includeBranch(Menu $model){
        return $this->collection($model->branch, new BranchTransformer());    
    }
}