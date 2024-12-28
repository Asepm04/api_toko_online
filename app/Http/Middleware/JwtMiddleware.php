<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        
        if(!$token)
        {
            return response()->json(["error"=>"the token is'nt provided"],401);
        }

        $user = JWTAuth::setToken($token)->authenticate();


        try
        {

            if(!$user)
            {
                return response()->json(["error"=>"Unauthorized"],401);
            }

        }catch(\Exception $e)
        {
            return response()->json(["error"=>"token invalid"],401);
        }


        
        return $next($request);
    }
}
