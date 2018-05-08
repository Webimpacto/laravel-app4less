<?php

namespace Webimpacto\LaravelApp4Less\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Webimpacto\LaravelApp4Less\Models\App4Less;

class App4lessSaveToken
{

    public function handle($request, Closure $next)
    {
        $app_token = \Webimpacto\App4Less\Client::getAPPToken();
        $app_uuid = \Webimpacto\App4Less\Client::getAppUUID();

        $existUserToken = App4Less::where(['id_user'=>Auth::id(),'token'=>$app_token])->first();

        if(Auth::check() && $app_token && $app_uuid && !$existUserToken){

            $app4less = new App4Less();
            $app4less->id_user = Auth::id();
            $app4less->token = $app_token;
            $app4less->uuid = $app_uuid;
            $app4less->user_agent = $_SERVER['HTTP_USER_AGENT'];

            $app4less->save();
        }

        return $next($request);
    }
}
