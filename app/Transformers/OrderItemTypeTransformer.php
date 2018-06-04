<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OrderItemType;
use Illuminate\Database\Eloquent\Collection;

class OrderItemTypeTransformer extends TransformerAbstract
{
    /**
     * Default models includes
     * @var array
     */
    protected $defaultIncludes  = [];

    /**
     * Available models includes
     * @var array
     */
    protected $availableIncludes = ['item'];
    public function transform(OrderItemType $model)
    {
        return [
            'id'              => (int) $model->id,
            'name'            => $model->name,
            'description'     => $model->description
        ];
    }

    /**
     * Includes order information.
     * @param OrderItemType $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeItem(OrderItemType $model){
        return $this->collection($model->detail, new OrderItemTransformer());
    }
}