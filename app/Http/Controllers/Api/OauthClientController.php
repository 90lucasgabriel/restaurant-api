<?php
namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Repositories\OauthClientRepository;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class OauthClientController extends Controller{    
    private $oauthClientRepository;
    public function __construct(
        OauthClientRepository      $oauthClientRepository
    ){
        $this->oauthClientRepository       = $oauthClientRepository;
    }

    public function create(Request $request){
        $data = $request->all();

        return $this->oauthClientRepository->save($data);
    }
}
