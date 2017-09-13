<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Presenters\OauthClientPresenter;
use App\Repositories\OauthClientRepository;
use App\Models\OauthClient;
//use App\Validators\AppValidator;

/**
 * Class AppRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OauthClientRepositoryEloquent extends BaseRepository implements OauthClientRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OauthClient::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return OauthClientPresenter::class;
    }


    public function save($data){
        $name         = $data["name"];

        $code         = md5($name . uniqid(rand(), true));
        $id           = md5($code . 'NameApplication' . uniqid(rand(), true));
        $secret       = md5($code . 'SecretApplication' . uniqid(rand(), true));

        $oauthClient  = OauthClient::create([
            'id'                     => $id,
            'name'                   => $name,
            'secret'                 => $secret,
            'password_client'        => 1,
            'personal_access_client' => 0,
            'redirect'               => '',
            'revoked'                => 0
        ]);


        return [
            'data'    => [
                'id'      => $id,
                'secret'  => $secret,
                'name'    => $name,
            ]
        ];

    }

}
