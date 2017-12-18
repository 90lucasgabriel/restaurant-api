<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\MenuTime;

/**
 * Class MenuTimeTransformer
 * 
 * @package namespace App\Transformers;
 */
class MenuTimeTransformer extends TransformerAbstract
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
    protected $availableIncludes = ['menu'];

    /**
     * Transform the \MenuTime entity
     * @param \MenuTime $model
     *
     * @return array
     */
    public function transform(MenuTime $model)
    {
        return [
            'id'            => (int) $model->id,
            'menu_id'       => (int) $model->menu_id,
            'day'           => $model->day,
            'time_start'    => $model->time_start,
            'time_end'      => $model->time_end
        ];
    }

    /**
     * Include menu's information
     *
     * @param Menu $model
     * @return ['data'=>[App\Models\Menu]]
     */
    public function includeMenu(MenuTime $model){
        return $this->item($model->menu, new MenuTransformer());
    }
}