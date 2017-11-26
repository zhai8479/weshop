<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Event;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class GetUserFromToken
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
        if (! $token = JWTAuth::setRequest($request)->getToken()) {
            return response()->json(['msg' => __('token_not_provided'), 'code' => 400]);
        }
        try {
            JWTAuth::authenticate($token);
        } catch (TokenExpiredException $e) {
            return response()->json(['msg' => __('token_expired'), 'code' => 401]);
        }  catch (JWTException $e) {
            return response()->json(['msg' => __('token_absent'), 'code' => 402, 'errors' => [$e->getMessage()]]);
        }
        return $next($request);
    }
}
