<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OauthClient;

class OauthClientTransformer extends TransformerAbstract
{
    protected $availableIncludes = [];

    public function transform(OauthClient $model)
    {
        return [
            'id'         => $model->id,
            'name'       => $model->name,
            'secret'     => $model->secret
        ];
    }

}