<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\UserPresenter;
use App\Repositories\UserRepository;
use App\Models\User;
use App\Validators\UserValidator;
use Socialite;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function queryDeliveryman($column, $key=null){
        return $this->model->where(['role'=>'deliveryman'])->lists($column, $key);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return UserPresenter::class;
    }

    public function updateDeviceToken($id, $deivceToken){
        $model = $this->model->find($id);
        $model->device_token = $deivceToken;
        $model->save();

        return $this->parserResult($model);
    }

    public function findLocalByToken($social, $token){
        $user = Socialite::driver($social)->userFromToken($token);
        
        $result = $this
            ->model
            ->where('email', $user->email)
            ->first();
        
        if($result){
            return $this->parserResult($result);
        }
        
        
        throw (new ModelNotFoundException())->setModel(get_class($this->model));
        
    }

    public function findSocialByToken($social, $token){
        $user = Socialite::driver($social)->userFromToken($token);

        if($user){
            $data = [
                "first_name"   => $user->name,
                "last_name"    => null,
                "email"        => $user->email,
                "username"     => $user->email,
                "picture"      => $user->avatar,
                "id_social"    => $user->id,
                "token_social" => $user->token,
                "register"     => true
            ];

            $data = ["data" => $data];

            return $data;
        }
    
        throw (new ModelNotFoundException())->setModel(get_class($this->model));
    }
}
