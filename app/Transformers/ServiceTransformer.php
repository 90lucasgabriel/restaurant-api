<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Product;

class ProductTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['images'];

    public function transform(Product $model)
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

    public function includeImages(Product $model){
        return $this->collection($model->productImage, new ProductImageTransformer());
    }

}