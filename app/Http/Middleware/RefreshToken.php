<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class RefreshToken
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $response = $next($request);

        if ($request->hasHeader('authorization')) {
            try {
                $newToken = \JWTAuth::setRequest($request)->parseToken()->refresh();
            } catch (TokenExpiredException $e) {
                return response()->json([
                    'code' => $e->getStatusCode(),
                    'errors' => [$e->getMessage()],
                    'msg' => __('message.token_expired'),
                ]);
            } catch (JWTException $e) {
                return response()->json([
                    'code' => $e->getStatusCode(),
                    'errors' => [$e->getMessage()],
                    'msg' => __('message.token_invalid'),
                ]);
            }
            // send the refreshed token back to the client
            $response->headers->set('Authorization', 'Bearer '.$newToken);
        }

        return $response;
    }
}
