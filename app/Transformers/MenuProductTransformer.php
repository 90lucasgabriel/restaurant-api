<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\MenuProduct;

/**
 * Class MenuProductTransformer
 * 
 * @package namespace App\Transformers;
 */
class MenuProductTransformer extends TransformerAbstract
{
    /**
     * Default models includes
     *
     * @var array
     */
    protected $defaultIncludes  = ['menu', 'product'];

    /**
     * Available models includes
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * Transform the \MenuProduct entity
     * @param \MenuProduct $model
     *
     * @return array
     */
    public function transform(MenuProduct $model)
    {
        return [
            'menu_id'       => (int) $model->menu_id,
            'product_id'    => (int) $model->product_id,
            'price'         => $model->name
        ];
    }

    /**
     * Include company's information
     *
     * @param Company $model
     * @return ['data'=>[App\Models\Company]]
     */
    public function includeCompany(MenuProduct $model){
        return $this->item($model->company, new CompanyTransformer());    
    }

    /**
     * Include menu's information
     *
     * @param Menu $model
     * @return ['data'=>[App\Models\Menu]]
     */
    public function includeMenu(MenuProduct $model){
        return $this->item($model->menu, new MenuTransformer());
    }

    /**
     * Include product's information
     *
     * @param Product $model
     * @return ['data'=>[App\Models\Product]]
     */
    public function includeProduct(MenuProduct $model){
        return $this->item($model->product, new ProductTransformer());
    }
}