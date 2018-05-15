<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProfileUpdate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $response = $next($request);

        if($response->headers->get('content-type') == 'application/json')
        {
            $collection = $response->original;
            $collection['profile_progess'] = \Auth::user()->profileProgress();
            $response->setContent(collect($collection));
        }

        return $response;
    }
}
