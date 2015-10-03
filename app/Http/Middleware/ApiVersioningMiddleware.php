<?php

namespace App\Http\Middleware;

use Log;
use Closure;
use Config;
use App\Parse\Api\RequestParser;
use App\Parse\Api\Version;

class ApiVersioningMiddleware
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
        $apiRequestParser         = new RequestParser($request);
        $apiVersion               = $apiRequestParser->getApiVersion();

        if($apiVersion == Version::Version1) {
            // Do something with your amazing api 1 version!
        }

        if($apiVersion == Version::Version2) {
            // Do something with your amazing api 2 version!
        }

        return $next($request);
    }

}
