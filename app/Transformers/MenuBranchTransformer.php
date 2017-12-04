<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\MenuBranch;

/**
 * Class MenuBranchTransformer
 * 
 * @package namespace App\Transformers;
 */
class MenuBranchTransformer extends TransformerAbstract
{
    /**
     * Default models includes
     *
     * @var array
     */
    protected $defaultIncludes  = ['menu', 'branch'];

    /**
     * Available models includes
     *
     * @var array
     */
    protected $availableIncludes = ['company'];

    /**
     * Transform the \MenuBranch entity
     * @param \MenuBranch $model
     *
     * @return array
     */
    public function transform(MenuBranch $model)
    {
        return [
            'id'            => (int) $model->id,
            'company_id'    => (int) $model->company_id,
            'menu_id'       => (int) $model->menu_id,
            'branch_id'     => (int) $model->branch_id
        ];
    }

    /**
     * Include company's information
     *
     * @param Company $model
     * @return ['data'=>[App\Models\Company]]
     */
    public function includeCompany(MenuBranch $model){
        return $this->item($model->company, new CompanyTransformer());    
    }

    /**
     * Include menu's information
     *
     * @param Menu $model
     * @return ['data'=>[App\Models\Menu]]
     */
    public function includeMenu(MenuBranch $model){
        return $this->item($model->menu, new MenuTransformer());
    }

    /**
     * Include branch's information
     *
     * @param Branch $model
     * @return ['data'=>[App\Models\Branch]]
     */
    public function includeBranch(MenuBranch $model){
        return $this->item($model->branch, new BranchTransformer());
    }
}