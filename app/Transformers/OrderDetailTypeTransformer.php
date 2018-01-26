<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OrderDetailType;
use Illuminate\Database\Eloquent\Collection;

class OrderDetailTypeTransformer extends TransformerAbstract
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
    protected $availableIncludes = ['detail'];
    public function transform(OrderDetailType $model)
    {
        return [
            'id'              => (int) $model->id,
            'name'            => $model->name,
            'description'     => $model->description
        ];
    }

    /**
     * Includes order information.
     * @param OrderDetailType $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeDetail(OrderDetailType $model){
        return $this->collection($model->detail, new OrderDetailTransformer());
    }
}