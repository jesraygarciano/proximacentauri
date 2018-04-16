<?php

namespace App\Http\Middleware;

use Closure;
use Resume;

class ResumeShow
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
        if (Auth::user()->role == 0) {
            // if ($request->ajax()) {
            //     return response('Unauthorized.', 401);
            // } else {
            //     // return redirect('/auth/register/student');
            //     // return redirect()->route('auth/register', ['student']);
            //     // return redirect()->action('PortalController@index');
            //     // return redirect()->action('Auth\AuthController@judge', 'student');
            //     return view('auth.login')->with('status', 'student');
            //     // return route('auth.login')->with('status', 'student');
            // }


        }

        return $next($request);
    }
}
