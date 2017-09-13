<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable
{
    use HasApiTokens, Notifiable, TransformableTrait;

    protected $table = 'users';
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'password', 
        'remember_token', 
        'social', 
        'id_social', 
        'avatar'];

    protected $hidden = ['password', 'remember_token'];

    public function client(){
        return $this->hasOne(Client::class);
    }

    public function employee(){
        return $this->hasOne(Employee::class);
    }

    public function userBranchFavorites(){
        return $this->belongsToMany(BranchFavorite::class, 'branch_favorites', 'user_id', 'branch_id')->withTimestamps();
    }
}
