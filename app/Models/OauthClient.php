<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OauthClient extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'oauth_clients';

    protected $fillable = [
        'id', 
        'name',
        'secret',
        'password_client',
        'personal_access_client',
        'redirect',
        'revoked' 
    ];

    protected $hidden = [
    	'id',
    	'password_client',
        'personal_access_client',
        'redirect',
        'revoked',
        'updated_at',
        'created_at'
    ];
}