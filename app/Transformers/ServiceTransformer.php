<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Service;

class ServiceTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['images'];

    public function transform(Service $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'price'      => $model->price,
            'description'=> $model->description,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeImages(Service $model){
        return $this->collection($model->productImage, new ServiceImageTransformer());
    }

}