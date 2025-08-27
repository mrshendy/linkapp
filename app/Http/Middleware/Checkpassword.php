<?php

namespace App\Http\Middleware;

use Closure;

class Checkpassword
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
        if($request->header('api_password')!== env("API_PASSWORD","1H5eLbX5QNrGFj7"))
        {
            return response()->json(['message'=>'Unauthenticated.']);
        }
        return $next($request);
    }
}
