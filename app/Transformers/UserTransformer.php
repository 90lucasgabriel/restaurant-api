<?php
namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['client','employee'];

    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'first_name' => $model->first_name,
            'last_name'  => $model->last_name,
            'avatar'     => $model->avatar,
            'email'      => $model->email,
            'role'       => $model->role
        ];
    }

    public function includeClient(User $model){
        if($model->client){
            return $this->item($model->client, new ClientTransformer());
        }
        else{
            return null;
        }
    }

    public function includeEmployee(User $model){
        if($model->employee){
            return $this->item($model->employee, new EmployeeTransformer());
        }
        else{
            return null;
        }
    }

}