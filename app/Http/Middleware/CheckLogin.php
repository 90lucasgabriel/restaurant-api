<?php

namespace App\Http\Middleware;

use Closure;
use Socialite;


class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data          = $request->all();
        $secret        = 'SecretPasswordSocial!';


        //Verifica se é login local ou por rede social
        if($request->social != null && $request->social != "local"){
            //É necessário um token da API da rede social requisitada pelo front-end
            if($request->social_token != null){
                //Pesquisa o usuário pelo token recebido
                $user = Socialite::driver($request->social)->userFromToken($request->social_token);
                
                //Compara o e-mail da requisição com o do token encontrado
                if($user->email === $request->username){
                    $data['password'] = md5($request->social . $request->username . $secret);
                }
            }
        }
        
        $request->replace($data);

        return $next($request);
    }
}
