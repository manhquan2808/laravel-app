<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $routeName = $request->route()->getName();
        // echo $routeName;
        // if (strstr(strtolower($routeName), 'admin') && $request->session()->get('role') !== 'AD') {
        //     return redirect('/');
        // }elseif(strstr(strtolower($routeName),'employee') && $request->session()->get('role') !== 'NV'){
        //     return redirect('/');
        // }

        if($request->session()->get('role') !== 'AD'){
            return redirect('/');
        }

        return $next($request);
    }
}
